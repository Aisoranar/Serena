<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthProfessionalController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'health_professional') {
            $students = Student::paginate(10);
            return view('healthprofessional.index', compact('students'));
        }
        
        abort(403, 'Acceso no autorizado');
    }

    public function create()
    {
        return view('healthprofessional.create');
    }

    public function store(Request $request)
    {
        // Validación de campos
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => 'required|string|in:CC,TI,CE',
            'document_number' => 'required|string|unique:students',
            'department_id' => 'required|exists:departments_and_cities,id',
            'city_id' => 'required|exists:departments_and_cities,id',
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

        // Crear el estudiante
        Student::create($request->all());

        return redirect()->route('healthprofessional.index')->with('success', 'Estudiante creado exitosamente.');
    }

    public function show(Student $student)
    {
        return view('healthprofessional.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('healthprofessional.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        // Validación de campos
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => 'required|string|in:CC,TI,CE',
            'document_number' => 'required|string|unique:students,document_number,' . $student->id,
            'department_id' => 'required|exists:departments_and_cities,id',
            'city_id' => 'required|exists:departments_and_cities,id',
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

        // Actualizar el estudiante
        $student->update($request->all());

        return redirect()->route('healthprofessional.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    public function destroy(Student $student)
    {
        // Eliminar el estudiante
        $student->delete();

        return redirect()->route('healthprofessional.index')->with('success', 'Estudiante eliminado exitosamente.');
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
        return view('healthprofessional.citas', compact('student'));
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
