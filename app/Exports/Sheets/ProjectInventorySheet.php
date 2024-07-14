<?php

namespace App\Exports\Sheets;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProjectInventorySheet implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithTitle
{
    protected $projectId;

    public function title(): string
    {
        return 'Inventario';
    }
    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function collection()
    {
        return Item::where('id_pro', $this->projectId)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Categoría',
            'Unidad',
            'Nombre',
            'Descripción',
            'Fecha',
            'Etiquetas',
        ];
    }

    public function map($item): array
    {
        return [
            $item->id_item,
            $item->category->name,
            $item->unit->name,
            $item->name,
            $item->description,
            \Carbon\Carbon::parse($item->date)->format('d/m/Y'),
            $item->tags->pluck('name')->implode(', '),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:H' . $sheet->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
