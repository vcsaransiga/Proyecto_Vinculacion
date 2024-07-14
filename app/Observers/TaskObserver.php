<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{

    public function created(Task $task)
    {
        // Verificar si la tarea ha sido creada con estado completado
        if ($task->status === 'Completado') {
            $this->updateProjectProgress($task);
        }
    }

    public function updated(Task $task)
    {
        // Verificar si el estado de la tarea ha cambiado a completado
        if ($task->isDirty('status') && $task->status === 'Completado') {
            $this->updateProjectProgress($task);
        }
    }


    private function updateProjectProgress(Task $task)
    {
        $project = $task->project;

        // Verificar si el porcentaje del proyecto es menor al 100%
        if ($project->progress < 100) {
            $newProgress = $project->progress + $task->percentage;

            // Asegurarse de que el progreso no exceda el 100%
            $project->progress = min($newProgress, 100);
            $project->save();
        }
    }
    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
