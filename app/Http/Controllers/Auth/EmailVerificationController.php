<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    /**
     * Verificar el correo electrónico del usuario.
     */
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        Auth::logout();
        return redirect('/sign-in')->with('success', 'Se ha verificado tu correo electrónico correctamente. Por favor, espera a que el administrador te asigne un rol.');
    }

    /**
     * Reenviar el correo de verificación.
     */
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link de verificacion enviado!');
    }
}
