<?php

namespace App\Http\Controllers;

use App\Models\Responsible;
use Illuminate\Http\Request;

class ResponsibleController extends Controller
{
    public function index()
    {
        $responsibles = Responsible::all();
        return view('modules.responsibles.index', compact('responsibles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Obtener el último responsable basado en el id_responsible
        $lastResponsible = Responsible::orderBy('id_responsible', 'desc')->first();

        // Extraer el número del id_responsible y convertirlo a entero
        $lastIdNumber = $lastResponsible ? intval(substr($lastResponsible->id_responsible, 5)) : 0;

        // Incrementar el número para el nuevo ID
        $newIdNumber = str_pad($lastIdNumber + 1, 2, '0', STR_PAD_LEFT);

        Responsible::create([
            'id_responsible' => 'RESP-' . $newIdNumber,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'area' => $request->area,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('responsibles.index')->with('success', 'Responsable agregado correctamente.');
    }

    public function update(Request $request, $id_responsible)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $responsible = Responsible::findOrFail($id_responsible);
        $responsible->update($request->all());

        return redirect()->route('responsibles.index')->with('success', 'Responsable actualizado correctamente.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $responsibles = Responsible::where('id_responsible', 'LIKE', "%$searchTerm%")
            ->orWhere('name', 'LIKE', "%$searchTerm%")
            ->orWhere('last_name', 'LIKE', "%$searchTerm%")
            ->orWhere('area', 'LIKE', "%$searchTerm%")
            ->orWhere('role', 'LIKE', "%$searchTerm%")
            ->get();

        return view('modules.responsibles.index', compact('responsibles'));
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Responsible::whereIn('id_responsible', $ids)->delete();
        return response()->json(["success" => "Responsables seleccionados eliminados exitosamente."]);
    }
    public function destroy($id_responsible)
    {
        $responsible = Responsible::findOrFail($id_responsible);
        $responsible->delete();

        return redirect()->route('responsibles.index')->with('success', 'Responsable eliminado correctamente.');
    }
}
