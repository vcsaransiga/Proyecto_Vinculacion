<?php

namespace App\Exports\Sheets;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProjectDataSheet implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithTitle
{
    protected $projectId;

    public function title(): string
    {
        return 'Datos';
    }

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function collection()
    {
        return Project::where('id_pro', $this->projectId)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Responsable',
            'Nombre',
            'Descripción',
            'Estado',
            'Progreso',
            'Fecha de Inicio',
            'Fecha de Fin',
            'Presupuesto',
        ];
    }

    public function map($project): array
    {
        return [
            $project->id_pro,
            $project->responsible->name . ' ' . $project->responsible->last_name,
            $project->name,
            $project->description,
            $project->status,
            $project->progress,
            \Carbon\Carbon::parse($project->start_date)->format('d/m/Y'),
            \Carbon\Carbon::parse($project->end_date)->format('d/m/Y'),
            $project->budget,
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
