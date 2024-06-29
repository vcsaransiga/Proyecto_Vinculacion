<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        return view('modules.users.profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'phone' => 'nullable|numeric|digits:10',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'max:255',
        ], [
            'name.required' => 'Name is required',
            'last_name.required' => 'Last name is required',
        ]);

        if ($request->hasFile('profile_photo')) {
            $user->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'about' => $request->about,
                'profile_photo' => $request->file('profile_photo')->store('users', 'public/profile_photos'),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'about' => $request->about,
            ]);
        }

        return back()->with('success', 'Tu perfil ha sido actualizado.');
    }
}
