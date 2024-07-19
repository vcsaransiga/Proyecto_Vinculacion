<?php

namespace App\Exports;

use App\Models\Audit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersAuditExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function collection()
    {
        return Audit::where('user_id', $this->userId)
            ->select('id', 'user_id', 'event', 'auditable_type', 'auditable_id',   'old_values', 'new_values', 'created_at', 'ip_address')
            ->get()
            ->map(function ($audit) {
                return [
                    'id' => $audit->id,
                    'user_id' => $audit->user_id,
                    'event' => $audit->event,
                    'auditable_type' => $audit->auditable_type,
                    'auditable_id' => $audit->auditable_id,
                    'old_values' => $audit->old_values,
                    'new_values' => $audit->new_values,
                    'created_at' => $audit->created_at,
                    'ip_address' => $audit->ip_address,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID de Usuario',
            'Evento',
            'Tipo modificado',
            'ID registro modificado',
            'Antes',
            'Después',
            'Fecha - Hora',
            'IP',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Aplicar estilos a las celdas
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

        // Aplicar bordes a todas las celdas del contenido
        $highestRow = $sheet->getHighestRow();
        $sheet->getStyle('A2:H' . $highestRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        return [
            // Otros estilos pueden ser agregados aquí
        ];
    }
}
