<?php

namespace App\Http\Controllers;

use App\Models\OperationType;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OperationsTypeExport;

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

        return redirect()->route('operations.index')->with('success', 'Tipo de operación creado correctamente.');
    }

    public function update(Request $request, $id_ope)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mov_type' => 'required|string|max:255',
        ]);

        $operationType = OperationType::findOrFail($id_ope);
        $operationType->update($request->all());

        return redirect()->route('operations.index')->with('success', 'Tipo de operación actualizado correctamente.');
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

        return redirect()->route('operations.index')->with('success', 'Tipo de operación eliminado correctamente.');
    }


    public function generatePDF()
    {
        $operationTypes = OperationType::all();
        $date = date('d/m/Y H:i:s');

        $data = [
            'title' => 'Registros de Tipos de Operaciones',
            'date' => $date,
            'operationTypes' => $operationTypes
        ];

        $pdf = PDF::loadView('modules.operations.pdf', $data);
        $pdfName = "Tipos_Operaciones - {$date}.pdf";

        return $pdf->download($pdfName);
    }

    public function exportExcel()
    {
        $date = date('d-m-Y H:i:s');
        $excelName = "Tipos_Operaciones {$date}.xlsx";
        return Excel::download(new OperationsTypeExport, $excelName);
    }
}
