<?php

namespace App\Exports;

use App\Models\CategoriesWarehouse;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CategoriesWarehouseExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * Retrieve all categories from the warehouse.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return CategoriesWarehouse::all(['id_catware', 'name']);
    }

    /**
     * Define the headings for the Excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID Categoría',
            'Nombre',
        ];
    }
}
