<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mostrar todos los docentes con paginación
        $teachers = Teacher::paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar formulario para crear un nuevo docente
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar y guardar un nuevo docente
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'school' => 'required|string',
            'department' => 'required|string',
            'position' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();  // Asignar el docente al usuario autenticado
        Teacher::create($data);

        return redirect()->route('teachers.index')->with('success', 'Docente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        // Mostrar los detalles de un docente específico
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        // Mostrar el formulario para editar un docente
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        // Validar y actualizar un docente existente
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        // Eliminar un docente
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Docente eliminado exitosamente.');
    }
}
