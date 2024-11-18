<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileStudent;
use App\Models\StudentObservationAudit;

class StudentObservationAuditController extends Controller
{
    /**
     * Mostrar el historial de observaciones de un estudiante.
     *
     * @param  int  $student_id
     * @return \Illuminate\Http\Response
     */
    public function show($student_id)
    {
        // Obtener el estudiante
        $student = ProfileStudent::findOrFail($student_id);

        // Obtener las observaciones del estudiante
        $observations = StudentObservationAudit::where('profile_student_id', $student_id)
            ->with('user') // Cargar la relación con el usuario
            ->orderBy('created_at', 'desc')
            ->get();

        // Retorna la vista con los datos
        return view('view.list.studentsaudit', compact('student', 'observations'));
    }

    /**
     * Registrar una nueva observación para el estudiante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'profile_student_id' => 'required|exists:profile_students,id',  // Asegurarse de que el ID del estudiante sea válido
            'observation' => 'required|string|max:255',  // Validación de la observación
        ]);
    
        // Crear la nueva observación
        StudentObservationAudit::create([
            'profile_student_id' => $request->input('profile_student_id'),  // El ID del estudiante
            'observation' => $request->input('observation'),  // La observación que se está registrando
            'user_id' => auth()->id(),  // ID del usuario autenticado
        ]);
    
        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('students.audit.show', $request->input('profile_student_id'))
                         ->with('success', 'Observación registrada con éxito.');
    }
}
