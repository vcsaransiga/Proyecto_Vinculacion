<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PeriodExport;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::all();
        return view('modules.periods.index', compact('periods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'academic_year' => 'required|integer|min:1900|max:2100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Period::create([
            'name' => $request->name,
            'academic_year' => $request->academic_year,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('periods.index')->with('success', 'Periodo agregado correctamente.');
    }

    public function update(Request $request, Period $period)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'academic_year' => 'required|integer|min:1900|max:2100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $period->update([
            'name' => $request->name,
            'academic_year' => $request->academic_year,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('periods.index')->with('success', 'Periodo actualizado correctamente.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $users = Period::where('id_period', 'LIKE', "%$searchTerm%")
            ->orWhere('academic_year', 'LIKE', "%$searchTerm%")
            ->get();

        return view('modules.periods.index', compact('periods'));
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Period::whereIn('id_period', $ids)->delete();
        return response()->json(["success" => "Periodos seleccionados eliminados exitosamente."]);
    }
    public function destroy(Period $period)
    {
        $period->delete();
        return redirect()->route('periods.index')->with('success', 'Periodo eliminado correctamente.');
    }

    public function generatePDF()
    {
        $periods = Period::all();
        $date = date('d/m/Y H:i:s');

        $data = [
            'title' => 'Registros de Periodos',
            'date' => $date,
            'periods' => $periods
        ];

        $pdf = PDF::loadView('modules.periods.pdf', $data);
        $pdfName = "Periodos - {$date}.pdf";

        return $pdf->download($pdfName);
    }

    public function exportExcel()
    {
        $date = date('d-m-Y H:i:s');
        $excelName = "Periodos {$date}.xlsx";
        return Excel::download(new PeriodExport, $excelName);
    }
}
