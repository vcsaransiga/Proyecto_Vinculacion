<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PragmaRX\Google2FA\Google2FA;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        return view('modules.users.profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        Log::info('Datos de la solicitud para actualización de perfil:', $request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => ['nullable', 'regex:/^09[0-9]{8}$/'],
            'about' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.string' => 'El nombre debe ser una cadena de caracteres',
            'name.max' => 'El nombre no puede tener más de 255 caracteres',
            'last_name.required' => 'El apellido es obligatorio',
            'last_name.string' => 'El apellido debe ser una cadena de caracteres',
            'last_name.max' => 'El apellido no puede tener más de 255 caracteres',
            'phone.regex' => 'El número de teléfono debe ser un número ecuatoriano válido y comenzar con 09',
            'about.string' => 'La descripción debe ser una cadena de caracteres',
            'about.max' => 'La descripción no puede tener más de 1000 caracteres',
        ]);

        Log::info('Validación pasada para actualización de perfil');

        $data = $request->only('name', 'last_name', 'phone', 'about');

        // Actualizar la opción de autenticación de dos factores
        if ($request->has('two_factor_enabled')) {
            $user->two_factor_enabled = true;
            $user->token_login = (new Google2FA())->generateSecretKey();
        } else {
            $user->two_factor_enabled = false;
            $user->token_login = null;
        }

        $user->update($data);

        Log::info('Perfil actualizado para el usuario', ['user_id' => $user->id]);

        return back()->with('success', 'Tu perfil ha sido actualizado.');
    }
}
