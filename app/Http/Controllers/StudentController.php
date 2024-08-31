<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Document;
use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $students = Auth::user()->role === 'health_professional' 
            ? Student::paginate(10) 
            : Student::where('user_id', Auth::id())->paginate(10);

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
            'department' => 'required|string',
            'city' => 'required|string',
            'zone' => 'required|string|in:Rural,Urbana',
            'birth_date' => 'required|date',
            'age' => 'required|integer|min:0',
            'marital_status' => 'required|string|in:Soltero,Casado,Unión Libre,Viudo',
            'has_children' => 'required|boolean',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:students',
            'health_regime' => 'required|string|in:Contributivo EPS,Subsidiado Sisbén,Régimen especial,Medicina prepagada,Ninguna',
            'eps_name' => 'nullable|string|max:255',
            'sisben_classification' => 'nullable|string|in:A,B,C,D',
            'academic_program' => 'required|string',
            'schedule' => 'required|string|in:Diurno,Nocturno',
            'disability' => 'nullable|string',
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
            'department' => 'required|string',
            'city' => 'required|string',
            'zone' => 'required|string|in:Rural,Urbana',
            'birth_date' => 'required|date',
            'age' => 'required|integer|min:0',
            'marital_status' => 'required|string|in:Soltero,Casado,Unión Libre,Viudo',
            'has_children' => 'required|boolean',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
            'health_regime' => 'required|string|in:Contributivo EPS,Subsidiado Sisbén,Régimen especial,Medicina prepagada,Ninguna',
            'eps_name' => 'nullable|string|max:255',
            'sisben_classification' => 'nullable|string|in:A,B,C,D',
            'academic_program' => 'required|string',
            'schedule' => 'required|string|in:Diurno,Nocturno',
            'disability' => 'nullable|string',
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

    public function uploadDocuments(Request $request, Student $student)
    {
        $request->validate([
            'document' => 'required|mimes:pdf|max:2048',
        ]);

        $filename = $request->file('document')->getClientOriginalName();
        $path = $request->file('document')->storeAs('documents', $filename);

        $student->documents()->create([
            'filename' => $filename,
            'path' => $path,
        ]);

        return back()->with('success', 'Documento subido exitosamente.');
    }

    public function viewDocument($id)
    {
        $document = Document::findOrFail($id);
        return response()->file(storage_path('app/' . $document->path));
    }

    public function citas(Student $student)
    {
        return view('students.citas', compact('student'));
    }

    public function addCita(Request $request, Student $student)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'observacion' => 'required|string',
        ]);

        $student->citas()->create($request->all());

        return back()->with('success', 'Cita agregada exitosamente.');
    }
}
