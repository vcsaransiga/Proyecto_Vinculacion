<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TaskExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Task::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Project ID',
            'Name',
            'Description',
            'Hours',
            'Start Date',
            'End Date',
            'Percentage',
        ];
    }

    public function map($task): array
    {
        return [
            $task->id_task,
            $task->id_pro,
            $task->name,
            $task->description,
            $task->hours,
            $task->start_date,
            $task->end_date,
            $task->percentage,
        ];
    }
}
