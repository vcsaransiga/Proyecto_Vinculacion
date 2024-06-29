<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Models\CategoriesWarehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $categories = CategoriesWarehouse::all();
        $warehouses = Warehouse::with('category')->get();
        return view('modules.warehouses.index', compact('warehouses', 'categories'));
    }

    public function create()
    {
        $categories = CategoriesWarehouse::all();
        return view('modules.warehouses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_catware' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Obtener la última bodega basada en el id_ware
        $last_ware = Warehouse::orderBy('id_ware', 'desc')->first();
        $lastIdNumber = $last_ware ? intval(substr($last_ware->id_ware, 5)) : 0;
        $newIdNumber = str_pad($lastIdNumber + 1, 2, '0', STR_PAD_LEFT);

        Warehouse::create([
            'id_ware' => 'WARE-' . $newIdNumber,
            'id_catware' => $request->id_catware,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('warehouses.index')->with('success', 'Bodega creada exitosamente.');
    }

    public function edit(Warehouse $warehouse)
    {
        $categories = CategoriesWarehouse::all();
        return view('modules.warehouses.edit', compact('warehouse', 'categories'));
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'id_catware' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $warehouse->update($request->all());

        return redirect()->route('warehouses.index')->with('success', 'Bodega actualizada exitosamente.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $warehouses = Warehouse::where('id_catware', 'LIKE', "%$searchTerm%")
            ->orWhere('name', 'LIKE', "%$searchTerm%")
            ->orWhere('description', 'LIKE', "%$searchTerm%")
            ->get();

        return view('modules.warehouses.index', compact('warehouses'));
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Warehouse::whereIn('id_ware', $ids)->delete();
        return response()->json(["success" => "Bodegas seleccionadas eliminadas exitosamente."]);
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('warehouses.index')->with('success', 'Bodega eliminada exitosamente.');
    }
}
