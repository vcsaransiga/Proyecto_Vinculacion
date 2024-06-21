<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Responsible;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('responsible')->get();
        $responsibles = Responsible::all();
        return view('modules.projects.index', compact('projects', 'responsibles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_responsible' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:255',
            'progress' => 'required|numeric|between:0,100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'budget' => 'required|numeric|min:0',
        ]);

        $lastProject = Project::orderBy('created_at', 'desc')->first();
        $lastIdNumber = $lastProject ? intval(substr($lastProject->id_pro, 5)) : 0;
        $newIdNumber = str_pad($lastIdNumber + 1, 4, '0', STR_PAD_LEFT);

        Project::create([
            'id_pro' => 'PROJ-' . $newIdNumber,
            'id_responsible' => $request->id_responsible,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'progress' => $request->progress,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'budget' => $request->budget,
        ]);

        return redirect()->route('projects.index')->with('success', 'Proyecto creado exitosamente.');
    }

    public function show($id)
    {
        $project = Project::with('responsible')->findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $responsibles = Responsible::all();
        return view('projects.edit', compact('project', 'responsibles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_responsible' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:255',
            'progress' => 'required|numeric|between:0,100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'budget' => 'required|numeric|min:0',
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Proyecto eliminado exitosamente.');
    }
}
