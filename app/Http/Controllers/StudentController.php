<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('modules.students.index', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'course' => 'nullable|string|max:255',
            'hours' => 'nullable|numeric',
        ]);

        // Obtener el último estudiante basado en el id_stud
        $lastStudent = Student::orderBy('id_stud', 'desc')->first();

        // Extraer el número del id_stud y convertirlo a entero
        $lastIdNumber = $lastStudent ? intval(substr($lastStudent->id_stud, 4)) : 0;

        // Incrementar el número para el nuevo ID
        $newIdNumber = str_pad($lastIdNumber + 1, 2, '0', STR_PAD_LEFT);

        Student::create([
            'id_stud' => 'EST-' . $newIdNumber,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'course' => $request->course,
            'hours' => $request->hours,
        ]);

        return redirect()->route('students.index')->with('success', 'Estudiante agregado exitosamente.');
    }

    public function update(Request $request, $id_stud)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'course' => 'nullable|string|max:255',
            'hours' => 'nullable|numeric',
        ]);

        $student = Student::findOrFail($id_stud);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado exitosamente.');
    }


    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $users = Student::where('id_stud', 'LIKE', "%$searchTerm%")
            ->orWhere('name', 'LIKE', "%$searchTerm%")
            ->orWhere('last_name', 'LIKE', "%$searchTerm%")
            ->orWhere('course', 'LIKE', "%$searchTerm%")
            ->get();

        return view('modules.students.index', compact('student'));
    }
    public function destroy($id_stud)
    {
        $student = Student::findOrFail($id_stud);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
