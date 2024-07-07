<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TaskExport;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $projects = Project::all();
        return view('modules.tasks.index', compact('tasks', 'projects'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_pro' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'hours' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'percentage' => 'required|numeric|between:0,100',
            'status' => 'required|string|max:255',
        ]);

        $lastTask = Task::orderBy('created_at', 'desc')->first();
        $lastIdNumber = $lastTask ? intval(substr($lastTask->id_task, 5)) : 0;
        $newIdNumber = str_pad($lastIdNumber + 1, 4, '0', STR_PAD_LEFT);

        Task::create([
            'id_task' => 'TASK-' . $newIdNumber,
            'id_pro' => $request->id_pro,
            'name' => $request->name,
            'description' => $request->description,
            'hours' => $request->hours,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'percentage' => $request->percentage,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
    }


    public function update(Request $request, Task $task)
    {
        // Log request data
        Log::info('Request data:', $request->all());

        try {
            // Validar los datos de la solicitud
            Log::info('Starting validation');
            $validatedData = $request->validate([
                'id_pro' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'hours' => 'required|numeric|min:0',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'percentage' => 'required|numeric|between:0,100',
                'status' => 'required|string|in:pending,completed',
            ]);
            Log::info('Validation passed', $validatedData);

            // Actualizar la tarea
            Log::info('Updating task');
            $task->update($validatedData);
            Log::info('Task updated successfully', $task->toArray());
        } catch (\Exception $e) {
            // Log cualquier excepción
            Log::error('Error during update process', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->route('tasks.index')->with('error', 'Error actualizando la tarea.');
        }

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        if (!is_array($ids) || empty($ids)) {
            return response()->json(["error" => "No se han seleccionado tareas."]);
        }

        $tasks = Task::whereIn('id_task', $ids)->get();
        foreach ($tasks as $task) {
            $task->delete();
        }

        return response()->json(["success" => "Tareas seleccionadas eliminadas exitosamente."]);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada correctamente.');
    }

    public function generatePDF()
    {
        $tasks = Task::all();
        $date = date('d/m/Y H:i:s');

        $data = [
            'title' => 'Registros de Tareas',
            'date' => $date,
            'tasks' => $tasks
        ];

        $pdf = PDF::loadView('modules.tasks.pdf', $data);
        $pdfName = "Tareas - {$date}.pdf";

        return $pdf->download($pdfName);
    }

    // public function exportExcel()
    // {
    //     $date = date('d-m-Y H:i:s');
    //     $excelName = "Tareas {$date}.xlsx";
    //     return Excel::download(new TaskExport, $excelName);
    // }
}
