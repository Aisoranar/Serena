<?php

namespace App\Http\Controllers;

use App\Models\ProfileStudent;
use App\Models\DepartmentAndCity;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function show($id)
    {
        $student = ProfileStudent::findOrFail($id);
        return view('view.estudiante.profile', compact('student'));
    }
    public function index()
    {
        if (auth()->user()->role =='superadmin' || auth()->user()->role =='docent') {
            $students = ProfileStudent::with('user')->get();
            return view('view.list.students', compact('students'));
        }

        return redirect()->route('home.index')->with('error', 'No tienes permiso para acceder a esta página.');
    }

    public function edit($id)
    {
        // Obtener el perfil del estudiante
        $profile = ProfileStudent::where('user_id', $id)->firstOrFail();
        // Obtener departamentos y ciudades
        $departments = DepartmentAndCity::select('id', 'department', 'city')->get()->groupBy('department');

        $data =[
            'profile'=> $profile,
            'departments'=> $departments
        ];

        return view('view.estudiante.profile', compact('data'));
    }


    public function update(Request $request, $user_id)
    {
        // Validación de los datos del formulario
        // $request->validate([
        //     'document_type' => 'required|string|max:50',
        //     'document_number' => 'required|string|max:50|unique:profile_students,document_number,' . $user_id . ',user_id',
        //     'zone' => 'nullable|string|max:255',
        //     'birth_date' => 'required|date',
        //     'age' => 'required|integer',
        //     'marital_status' => 'nullable|string|max:50',
        //     'has_children' => 'nullable|boolean',
        //     'address' => 'required|string|max:255',
        //     'phone' => 'required|string|max:20',
        //     // 'department_id' => 'nullable|exists:departments,id', // Asegúrate de que exista la tabla correspondiente
        //     // 'city_id' => 'nullable|exists:cities,id', // Asegúrate de que exista la tabla correspondiente
        //     'health_regime' => 'nullable|string|max:255',
        //     'eps_name' => 'nullable|string|max:255',
        //     'sisben_classification' => 'nullable|string|max:255',
        //     'academic_program' => 'nullable|string|max:255',
        //     'schedule' => 'nullable|string|max:255',
        //     'disability' => 'nullable|string|max:255',
        //     // Los nombres no deberían ser requeridos en este contexto
        //     'first_name' => 'nullable|string|max:255',
        //     'second_name' => 'nullable|string|max:255',
        //     'first_lastname' => 'nullable|string|max:255',
        //     'second_lastname' => 'nullable|string|max:255',
        // ]);

        // Buscar el perfil del estudiante
        $profile = ProfileStudent::where('user_id', $user_id)->firstOrFail();

        // Actualizar el perfil del estudiante con los datos proporcionados
        $profile->update($request->only([
            'document_type',
            'document_number',
            'zone',
            'birth_date',
            'age',
            'marital_status',
            'has_children',
            'address',
            'phone',
            'department_id',
            'city_id',
            'health_regime',
            'eps_name',
            'sisben_classification',
            'academic_program',
            'schedule',
            'disability',
            'first_name',
            'second_name',
            'first_lastname',
            'second_lastname'
        ]));

        // Redirigir con un mensaje de éxito
        return redirect()->route('perfil.editar', parameters: $profile->user_id)->with('success', 'Perfil actualizado exitosamente.');
    }

    // Nueva función para manejar el modal de edición
    public function editModal($id)
    {
        $profile = ProfileStudent::with('user')->where('user_id', $id)->firstOrFail();
        $departments = DepartmentAndCity::select('id', 'department', 'city')->get()->groupBy('department');

        return response()->json([
            'profile' => $profile,
            'departments' => $departments
        ]);
    }

    public function updateFromModal(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Encuentra al estudiante por ID
        $student = ProfileStudent::findOrFail($id);

        // Actualiza los datos
        $student->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);

        // Redirecciona con mensaje de éxito
        return redirect()->back()->with('success', 'Estudiante actualizado exitosamente.');
    }

    public function updateStudentObservation(Request $request)
    {
        // Encuentra al estudiante por ID
        $student = ProfileStudent::findOrFail($request->input('student_id'));

        // Actualiza los datos
        $student->update([
            'observation' => $request->input('observation'),
        ]);

        // Redirecciona con mensaje de éxito
        return redirect()->back()->with('success', 'Observación actualizada exitosamente.');
    }

    
    
}
