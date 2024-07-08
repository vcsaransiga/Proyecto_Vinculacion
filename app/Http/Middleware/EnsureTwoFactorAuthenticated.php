<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureTwoFactorAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->two_factor_enabled && !$request->session()->get('two_factor_authenticated')) {
            return redirect()->route('login.2fa.form', ['user' => $user->id]);
        }

        return $next($request);
    }
}
