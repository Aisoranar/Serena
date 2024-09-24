<?php

namespace App\Http\Controllers;

use App\Models\ProfileStudent;
use App\Models\DepartmentAndCity;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index()
{
    if (auth()->user()->is_superadmin) {
        $students = ProfileStudent::with('user')->get();
        return view('view.list.list.students', compact('students'));
    }

    return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta página.');
}


    public function edit($id)
    {
        // Obtener el perfil del estudiante o crear uno nuevo
        $profile = ProfileStudent::firstOrCreate(['user_id' => $id], [
            'document_type' => 'CC',
            'document_number' => '',
            'zone' => 'Urbana',
            'birth_date' => now(),
            'department_id' => 1, // Asegúrate de proporcionar valores válidos
            'city_id' => 1, // Asegúrate de proporcionar valores válidos
            'age' => 0, // Establecer un valor por defecto temporal
            'address' => '', // Asegúrate de proporcionar un valor por defecto para el address
            'phone' => '', // Asegúrate de proporcionar un valor por defecto para el phone
        ]);

        // Obtener los departamentos y ciudades
        $departments = DepartmentAndCity::select('id', 'department')->distinct()->get();
        $cities = DepartmentAndCity::all();

        return view('view.estudiante.profile', compact('profile', 'departments', 'cities'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los campos
        $request->validate([
            'document_type' => 'required|in:CC,TI,CE',
            'document_number' => 'required|unique:profile_students,document_number,' . $id,
            'zone' => 'required|in:Rural,Urbana',
            'birth_date' => 'required|date',
            'marital_status' => 'required|in:Soltero,Casado,Unión Libre,Viudo',
            'has_children' => 'required|boolean',
            'address' => 'required|string', // Validar el campo address
            'phone' => 'required|string', // Validar el campo phone
            'email' => 'required|email|unique:profile_students,email,' . $id,
            'health_regime' => 'required',
            'academic_program' => 'required',
            'schedule' => 'required|in:Diurno,Nocturno',
            'disability' => 'nullable|string',
            'department_id' => 'required|exists:departments_and_cities,id',
            'city_id' => 'required|exists:departments_and_cities,id',
            'age' => 'required|integer|min:0', // Asegúrate de incluir la validación para age
        ]);

        // Encuentra el perfil y lo actualiza
        $profile = ProfileStudent::where('user_id', $id)->firstOrFail();
        $profile->update($request->all());

        return redirect()->route('perfil.editar', $id)->with('success', 'Perfil actualizado correctamente.');
    }
}
