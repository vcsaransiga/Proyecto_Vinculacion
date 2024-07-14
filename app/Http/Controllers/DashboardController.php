<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtén solo seis proyectos
        $tasks = Task::limit(6)->get();
        $projects = Project::limit(6)->get();
        // Pasa los proyectos a la vista del dashboard
        return view('dashboard', compact('projects'), compact('tasks'));
    }
}
