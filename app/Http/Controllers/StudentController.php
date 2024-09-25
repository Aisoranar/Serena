<?php

namespace App\Http\Controllers;

use App\Models\ProfileStudent;
use App\Models\DepartmentAndCity;
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
            'department_id' => 1, 
            'city_id' => 1, 
            'age' => 0,
            'address' => '',
            'phone' => '',
        ]);

        // Obtener departamentos y ciudades
        $departments = DepartmentAndCity::select('id', 'department', 'city')->get()->groupBy('department');

        return view('view.estudiante.profile', compact('profile', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $student = ProfileStudent::findOrFail($id);

        // Validación de los campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'ciudad' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        // Actualización de los datos
        $student->update([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'ciudad' => $request->input('ciudad'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('student.show', $student->id)
                         ->with('success', 'Perfil actualizado correctamente.');
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

    
    
}
