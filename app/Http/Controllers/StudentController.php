<?php

// app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'health_professional') {
            $students = Student::all();
        } else {
            $students = Student::where('user_id', Auth::id())->get();
        }
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => 'required|string|in:CC,TI,CE',
            'document_number' => 'required|string|unique:students',
            // Agrega todas las validaciones necesarias aquí...
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Estudiante creado exitosamente.');
    }

    public function show(Student $student)
    {
        $this->authorize('view', $student);
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $this->authorize('update', $student);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $this->authorize('update', $student);
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => 'required|string|in:CC,TI,CE',
            'document_number' => 'required|string|unique:students,document_number,' . $student->id,
            // Agrega todas las validaciones necesarias aquí...
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    public function destroy(Student $student)
    {
        $this->authorize('delete', $student);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
