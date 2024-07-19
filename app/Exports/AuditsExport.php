<?php

namespace App\Exports;

use App\Models\Audit;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AuditsExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        return Audit::select('id', 'user_id', 'event', 'auditable_type', 'auditable_id', 'old_values', 'new_values', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID de Usuario',
            'Evento',
            'Tipo de Audit',
            'ID de Auditado',
            'Valores Anteriores',
            'Nuevos Valores',
            'Fecha de Creación',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:H1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->getStyle('A2:H' . $sheet->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        return $sheet;
    }
}
