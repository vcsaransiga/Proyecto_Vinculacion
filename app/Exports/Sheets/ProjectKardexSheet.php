<?php

namespace App\Exports\Sheets;

use App\Models\Kardex;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProjectKardexSheet implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithTitle
{
    protected $projectId;

    public function title(): string
    {
        return 'Kardex';
    }

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function collection()
    {
        return Kardex::where('id_pro', $this->projectId)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Operación',
            'Bodega',
            'Fecha',
            'Cantidad',
            'Precio',
            'Balance',
        ];
    }

    public function map($kardex): array
    {
        return [
            $kardex->id_kardex,
            $kardex->operationType->name,
            $kardex->warehouse->name,
            \Carbon\Carbon::parse($kardex->date)->format('d/m/Y'),
            $kardex->quantity,
            $kardex->price,
            $kardex->balance,
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
