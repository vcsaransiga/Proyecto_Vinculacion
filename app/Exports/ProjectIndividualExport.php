<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\Sheets\ProjectDataSheet;
use App\Exports\Sheets\ProjectTasksSheet;
use App\Exports\Sheets\ProjectKardexSheet;
use App\Exports\Sheets\ProjectInventorySheet;


class ProjectIndividualExport implements WithMultipleSheets
{
    protected $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new ProjectDataSheet($this->projectId);
        $sheets[] = new ProjectTasksSheet($this->projectId);
        $sheets[] = new ProjectKardexSheet($this->projectId);
        $sheets[] = new ProjectInventorySheet($this->projectId);

        return $sheets;
    }
}
