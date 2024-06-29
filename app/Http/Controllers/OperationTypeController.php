<?php

namespace App\Http\Controllers;

use App\Models\OperationType;
use Illuminate\Http\Request;

class OperationTypeController extends Controller
{
    public function index()
    {
        $operationTypes = OperationType::all();
        return view('modules.operations.index', compact('operationTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mov_type' => 'required|string|max:255',
        ]);

        OperationType::create($request->all());

        return redirect()->route('operations.index')->with('success', 'Tipo de operación creado exitosamente.');
    }

    public function update(Request $request, $id_ope)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mov_type' => 'required|string|max:255',
        ]);

        $operationType = OperationType::findOrFail($id_ope);
        $operationType->update($request->all());

        return redirect()->route('operations.index')->with('success', 'Tipo de operación actualizado exitosamente.');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        OperationType::whereIn('id_ope', $ids)->delete();
        return response()->json(["success" => "Tipos de operaciones seleccionados eliminados exitosamente."]);
    }

    public function destroy($id_ope)
    {
        $operationType = OperationType::findOrFail($id_ope);
        $operationType->delete();

        return redirect()->route('operations.index')->with('success', 'Tipo de operación eliminado exitosamente.');
    }
}
