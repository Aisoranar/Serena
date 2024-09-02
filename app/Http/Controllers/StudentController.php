<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', Auth::id())->first();
        
        if (!$student) {
            return redirect()->route('home')->withErrors('No se ha encontrado el perfil del estudiante.');
        }
    
        return view('students.index', compact('student'));
    }
    

    public function show()
    {
        // Obtener el estudiante relacionado con el usuario autenticado
        $student = Student::where('user_id', Auth::id())->first();

        // Manejar el caso en que no se encuentra el estudiante
        if (!$student) {
            return redirect()->route('students.index')->withErrors('No se ha encontrado el perfil del estudiante.');
        }

        return view('students.show', compact('student'));
    }

    public function uploadDocuments(Request $request)
    {
        // Validar el documento subido
        $request->validate([
            'document' => 'required|mimes:pdf|max:2048',
        ]);

        // Obtener el estudiante relacionado con el usuario autenticado
        $student = Student::where('user_id', Auth::id())->first();

        // Redirigir con un mensaje de error si no se encuentra el perfil
        if (!$student) {
            return redirect()->route('students.index')->withErrors('No se ha encontrado el perfil del estudiante.');
        }

        // Subir y guardar el documento
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
        // Buscar el documento asegurándose de que pertenece al estudiante autenticado
        $document = Document::where('id', $id)->whereHas('student', function ($query) {
            $query->where('user_id', Auth::id());
        })->firstOrFail();

        return response()->file(storage_path('app/' . $document->path));
    }
}
