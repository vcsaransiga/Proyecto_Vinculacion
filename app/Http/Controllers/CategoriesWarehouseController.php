<?php

namespace App\Http\Controllers;

use App\Models\CategoriesWarehouse;
use Illuminate\Http\Request;

class CategoriesWarehouseController extends Controller
{
    public function index()
    {
        $categories = CategoriesWarehouse::all();
        return view('modules.categories_warehouse.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Obtener la última categoría basado en el id_catware
        $last_cat = CategoriesWarehouse::orderBy('id_catware', 'desc')->first();

        // Extraer el número del id_catware y convertirlo a entero
        $lastIdNumber = $last_cat ? intval(substr($last_cat->id_catware, 7)) : 0;

        // Incrementar el número para el nuevo ID
        $newIdNumber = str_pad($lastIdNumber + 1, 2, '0', STR_PAD_LEFT);

        CategoriesWarehouse::create([
            'id_catware' => 'CATWAR-' . $newIdNumber,
            'name' => $request->name,
        ]);

        return redirect()->route('categories_warehouse.index')->with('success', 'Categoría creada correctamente.');
    }

    public function update(Request $request, $id_catware)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = CategoriesWarehouse::find($id_catware);
        $category->update($request->all());

        return redirect()->route('categories_warehouse.index')->with('success', 'Categoría actualizada correctamente.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $categories = CategoriesWarehouse::where('id_catware', 'LIKE', "%$searchTerm%")
            ->orWhere('name', 'LIKE', "%$searchTerm%")
            ->get();

        return view('modules.categories_warehouse.index', compact('categories'));
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        CategoriesWarehouse::whereIn('id_catware', $ids)->delete();
        return response()->json(["success" => "Categorías de bodega seleccionadas eliminadas exitosamente."]);
    }
    public function destroy($id_catware)
    {
        $category = CategoriesWarehouse::find($id_catware);
        $category->delete();

        return redirect()->route('categories_warehouse.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
