<?php

namespace App\Http\Controllers;

use App\Models\Kardex;
use Illuminate\Http\Request;
use App\Models\OperationType;
use App\Models\Warehouse;
use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KardexExport;

class KardexController extends Controller
{
    public function index()
    {
        $kardexEntries = Kardex::all();
        $operationTypes = OperationType::all();
        $warehouses = Warehouse::all();
        $projects = Project::all();
        return view('modules.kardex.index', compact('kardexEntries', 'operationTypes', 'warehouses', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ope' => 'required|integer',
            'id_ware' => 'required|string|max:255',
            'id_pro' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'balance' => 'required|integer|min:0',
        ]);

        $lastKardex = Kardex::orderBy('created_at', 'desc')->first();
        $lastIdNumber = $lastKardex ? intval(substr($lastKardex->id_kardex, 7)) : 0;
        $newIdNumber = str_pad($lastIdNumber + 1, 4, '0', STR_PAD_LEFT);

        Kardex::create([
            'id_kardex' => 'KARDEX-' . $newIdNumber,
            'id_ope' => $request->id_ope,
            'id_ware' => $request->id_ware,
            'id_pro' => $request->id_pro,
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'balance' => $request->balance,
        ]);

        return redirect()->route('kardex.index')->with('success', 'Kardex entry created successfully.');
    }

    public function show($id)
    {
        $kardex = Kardex::with(['operationType', 'warehouse', 'project'])->findOrFail($id);
        return view('kardex.show', compact('kardex'));
    }

    public function edit($id)
    {
        $kardex = Kardex::findOrFail($id);
        $operationTypes = OperationType::all();
        $warehouses = Warehouse::all();
        $projects = Project::all();
        return view('kardex.edit', compact('kardex', 'operationTypes', 'warehouses', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $kardex = Kardex::findOrFail($id);

        $request->validate([
            'id_ope' => 'required|integer',
            'id_ware' => 'required|string|max:255',
            'id_pro' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'balance' => 'required|integer|min:0',
        ]);

        $kardex->update($request->all());

        return redirect()->route('kardex.index')->with('success', 'Kardex entry updated successfully.');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if (!is_array($ids) || empty($ids)) {
            return response()->json(["error" => "No items selected."]);
        }

        Kardex::whereIn('id_kardex', $ids)->delete();

        return response()->json(["success" => "Selected kardex entries deleted successfully."]);
    }

    public function destroy($id)
    {
        $kardex = Kardex::findOrFail($id);
        $kardex->delete();

        return redirect()->route('kardex.index')->with('success', 'Kardex entry deleted successfully.');
    }

    public function generatePDF()
    {
        $kardexEntries = Kardex::all();
        $date = date('d/m/Y H:i:s');

        $data = [
            'title' => 'Kardex Records',
            'date' => $date,
            'kardexEntries' => $kardexEntries
        ];

        $pdf = PDF::loadView('modules.kardex.pdf', $data);
        $pdfName = "Kardex - {$date}.pdf";

        return $pdf->download($pdfName);
    }

    // public function exportExcel()
    // {
    //     $date = date('d-m-Y H:i:s');
    //     $excelName = "Kardex {$date}.xlsx";
    //     return Excel::download(new KardexExport, $excelName);
    // }
}
