<?php

namespace App\Exports;

use App\Models\Responsible;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ResponsibleExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
     * Retrieve all responsibles.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Responsible::all(['id_responsible', 'card_id', 'name', 'last_name', 'area', 'role', 'status', 'id_user']);
    }

    /**
     * Define the headings for the Excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID Responsable',
            'Cédula',
            'Nombre',
            'Apellido',
            'Área',
            'Rol',
            'Estado',
            'ID Usuario',
        ];
    }

    /**
     * Apply styles to the worksheet.
     *
     * @param Worksheet $sheet
     * @return array
     */
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
