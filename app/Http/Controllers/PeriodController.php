<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        return redirect()->route('periods.index')->with('success', 'Periodo agregado exitosamente.');
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

        return redirect()->route('periods.index')->with('success', 'Periodo actualizado exitosamente.');
    }

    public function destroy(Period $period)
    {
        $period->delete();
        return redirect()->route('periods.index')->with('success', 'Periodo eliminado exitosamente.');
    }
}
