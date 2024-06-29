<?php

namespace App\Http\Controllers;

use App\Models\CategoryItem;
use Illuminate\Http\Request;

class CategoryItemController extends Controller
{
    public function index()
    {
        $categoryItems = CategoryItem::all();
        return view('modules.categories_items.index', compact('categoryItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        // Obtener la última categoría basada en el id_catitem
        $lastCatItem = CategoryItem::orderBy('id_catitem', 'desc')->first();
        $lastIdNumber = $lastCatItem ? intval(substr($lastCatItem->id_catitem, 8)) : 0;
        $newIdNumber = str_pad($lastIdNumber + 1, 2, '0', STR_PAD_LEFT);

        CategoryItem::create([
            'id_catitem' => 'CATITEM-' . $newIdNumber,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('categories_items.index')->with('success', 'Categoría de artículo creada exitosamente.');
    }

    public function update(Request $request, $id_catitem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $categoryItem = CategoryItem::findOrFail($id_catitem);
        $categoryItem->update($request->all());

        return redirect()->route('categories_items.index')->with('success', 'Categoría de artículo actualizada exitosamente.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $categoryItems = CategoryItem::where('id_catitem', 'LIKE', "%$searchTerm%")
            ->orWhere('name', 'LIKE', "%$searchTerm%")
            ->orWhere('description', 'LIKE', "%$searchTerm%")
            ->get();

        return view('modules.categories_items.index', compact('categoryItems'));
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        CategoryItem::whereIn('id_catitem', $ids)->delete();
        return response()->json(["success" => "Categorias seleccionadas eliminadas exitosamente."]);
    }
    public function destroy($id_catitem)
    {
        $categoryItem = CategoryItem::findOrFail($id_catitem);
        $categoryItem->delete();

        return redirect()->route('categories_items.index')->with('success', 'Categoría de artículo eliminada exitosamente.');
    }
}
