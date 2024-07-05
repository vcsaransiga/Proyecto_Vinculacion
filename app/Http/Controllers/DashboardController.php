<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtén solo seis proyectos
        $projects = Project::limit(6)->get();
        // Pasa los proyectos a la vista del dashboard
        return view('dashboard', compact('projects'));
    }
}
