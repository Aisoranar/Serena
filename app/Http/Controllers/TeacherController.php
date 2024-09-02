<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(10);
        // Cambiar la ruta de la vista a 'docentes.index-docente'
        return view('docentes.index-docente', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'school' => 'required|string',
            'department' => 'required|string',
            'position' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();
        Teacher::create($data);

        return redirect()->route('teachers.index')->with('success', 'Docente creado exitosamente.');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'school' => 'required|string',
            'department' => 'required|string',
            'position' => 'required|string|max:255',
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Docente actualizado exitosamente.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Docente eliminado exitosamente.');
    }
}
