<?php

namespace App\Exports;

use App\Models\Project;


use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Project::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Responsible ID',
            'Name',
            'Description',
            'Status',
            'Progress',
            'Start Date',
            'End Date',
            'Budget',
            'Image',
        ];
    }
    public function map($project): array
    {
        return [
            $project->id_pro,
            $project->id_responsible,
            $project->name,
            $project->description,
            $project->status,
            $project->progress,
            $project->start_date,
            $project->end_date,
            $project->budget,
            $project->image,
        ];
    }
}
