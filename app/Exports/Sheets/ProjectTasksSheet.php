<?php

namespace App\Exports\Sheets;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProjectTasksSheet implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithTitle
{
    protected $projectId;

    public function title(): string
    {
        return 'Tareas';
    }

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function collection()
    {
        return Task::where('id_pro', $this->projectId)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Descripción',
            'Horas',
            'Fecha de Inicio',
            'Fecha de Fin',
            'Porcentaje de proyecto',
            'Estado',
        ];
    }

    public function map($task): array
    {
        return [
            $task->id_task,
            $task->name,
            $task->description,
            $task->hours,
            $task->start_date,
            $task->end_date,
            $task->percentage,
            $task->status,
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
