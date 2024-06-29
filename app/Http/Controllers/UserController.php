<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('modules.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'status' => 'nullable|boolean',
            'password' => 'required|string',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'status' => 'nullable|boolean',
        ]);

        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $users = User::where('id', 'LIKE', "%$searchTerm%")
            ->orWhere('name', 'LIKE', "%$searchTerm%")
            ->orWhere('last_name', 'LIKE', "%$searchTerm%")
            ->orWhere('email', 'LIKE', "%$searchTerm%")
            ->get();

        return view('modules.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function deleteSelectedUsers(Request $request)
    {
        $userIds = $request->input('userIds');

        // Eliminar los usuarios seleccionados de la base de datos
        $users = User::whereIn('id', $userIds)->get();
        foreach ($users as $user) {
            $user->delete();
        }

        return response()->json(['message' => 'Usuarios eliminados correctamente.']);
    }
}
