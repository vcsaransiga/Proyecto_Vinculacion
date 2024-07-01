<?php

namespace App\Http\Controllers;

use App\Models\MeasurementUnit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MeasurementUnitExport;

class MeasurementUnitController extends Controller
{
    public function index()
    {
        $units = MeasurementUnit::all();
        return view('modules.measurement_units.index', compact('units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:10',
        ]);

        $last_unit = MeasurementUnit::orderBy('id_unit', 'desc')->first();
        $lastIdNumber = $last_unit ? intval(substr($last_unit->id_unit, 5)) : 0;
        $newIdNumber = str_pad($lastIdNumber + 1, 2, '0', STR_PAD_LEFT);

        MeasurementUnit::create([
            'id_unit' => 'UNIT-' . $newIdNumber,
            'name' => $request->name,
            'symbol' => $request->symbol,
        ]);

        return redirect()->route('measurement_units.index')->with('success', 'Unidad de medida creada correctamente.');
    }

    public function update(Request $request, MeasurementUnit $measurement_unit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:10',
        ]);

        $measurement_unit->update($request->all());

        return redirect()->route('measurement_units.index')->with('success', 'Unidad de medida actualizada correctamente.');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        MeasurementUnit::whereIn('id_unit', $ids)->delete();
        return response()->json(["success" => "Unidades de medida seleccionadas eliminadas exitosamente."]);
    }
    public function destroy(MeasurementUnit $measurement_unit)
    {
        $measurement_unit->delete();
        return redirect()->route('measurement_units.index')->with('success', 'Unidad de medida eliminada correctamente.');
    }

    public function generatePDF()
    {
        $measurementUnits = MeasurementUnit::all();
        $date = date('d/m/Y H:i:s');

        $data = [
            'title' => 'Registros de Unidades de Medida',
            'date' => $date,
            'measurementUnits' => $measurementUnits
        ];

        $pdf = PDF::loadView('modules.measurement_units.pdf', $data);
        $pdfName = "Unidades_Medida - {$date}.pdf";

        return $pdf->download($pdfName);
    }

    public function exportExcel()
    {
        $date = date('d-m-Y H:i:s');
        $excelName = "Unidades_Medida {$date}.xlsx";
        return Excel::download(new MeasurementUnitExport, $excelName);
    }
}
