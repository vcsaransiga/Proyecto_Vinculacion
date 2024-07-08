<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Exports\UserExport;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('modules.users.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'status' => 'required|boolean',
            'password' => 'required|string',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $user = User::create($request->all());

        if ($request->has('roles')) {
            $user->assignRole($request->roles);
        }

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'telephone' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'nullable|boolean',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $user->update($request->all());
        $user->syncRoles($request->roles);

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

        $roles = Role::all();
        return view('modules.users.index', compact('users', 'roles'));
    }

    public function deactivateAll(Request $request)
    {
        $ids = $request->ids;

        if (!is_array($ids) || empty($ids)) {
            return response()->json(["error" => "No se han seleccionado usuarios."]);
        }

        $users = User::whereIn('id', $ids)->get();
        foreach ($users as $user) {
            $user->update(['status' => 0]);
        }

        return response()->json(["success" => "Usuarios seleccionados desactivados exitosamente."]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if (!is_array($ids) || empty($ids)) {
            return response()->json(["error" => "No se han seleccionado usuarios."]);
        }

        $users = User::whereIn('id', $ids)->get();
        foreach ($users as $user) {
            $user->delete();
        }

        return response()->json(["success" => "Usuarios seleccionados eliminados exitosamente."]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User eliminado exitosamente.');
    }

    public function generatePDF()
    {
        $users = User::all();
        $date = date('d/m/Y H:i:s');

        $data = [
            'title' => 'Registros de Usuarios',
            'date' => $date,
            'users' => $users
        ];

        $pdf = PDF::loadView('modules.users.pdf', $data);
        $pdfName = "Usuarios - {$date}.pdf";

        return $pdf->download($pdfName);
    }

    public function exportExcel()
    {
        $date = date('d-m-Y H:i:s');
        $excelName = "Usuarios {$date}.xlsx";
        return Excel::download(new UserExport, $excelName);
    }

    public function getUserRoles(User $user)
    {
        return response()->json(['roles' => $user->roles->pluck('name')->toArray()]);
    }
}
