<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Str;

class ThrottleLogins
{
    protected $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle($request, Closure $next)
    {
        $key = $this->throttleKey($request);

        $maxAttempts = 2; // Número máximo de intentos
        $decayMinutes = 1; // Periodo de tiempo en minutos

        if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
            $retryAfter = $this->limiter->availableIn($key);
            return redirect()->back()
                ->withErrors(['attempts' => 'Por favor, inténtalo de nuevo después de  ' . $retryAfter . ' segundos.'])
                ->with('retry_after', $retryAfter);
        }

        $this->limiter->hit($key, $decayMinutes * 60);

        $response = $next($request);

        // Limpiar los intentos si la solicitud fue exitosa
        if ($response->getStatusCode() == 200) {
            $this->limiter->clear($key);
        }

        return $response;
    }

    protected function throttleKey($request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }
}
