<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    /**
     * Verificar el correo electrónico del usuario.
     */
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/dashboard'); // Redirige a la página deseada después de la verificación
    }

    /**
     * Reenviar el correo de verificación.
     */
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
