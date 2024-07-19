<?php

namespace App\Exports;

use App\Models\Kardex;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KardexExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
     * Retrieve all Kardex entries.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kardex::all(['id_kardex', 'id_ope', 'id_ware', 'id_pro', 'id_item', 'detail', 'date', 'quantity', 'price', 'balance']);
    }

    /**
     * Define the headings for the Excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID Kardex',
            'ID Operación',
            'ID Bodega',
            'ID Proyecto',
            'ID Ítem',
            'Detalle',
            'Fecha',
            'Cantidad',
            'Precio',
            'Balance',
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
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->getStyle('A2:J' . $sheet->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        return $sheet;
    }
}
