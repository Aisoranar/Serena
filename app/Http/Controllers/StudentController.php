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
            return redirect()->back()->withErrors('No se ha encontrado el perfil del estudiante.');
        }
    
        return view('students.index', compact('student'));
    }
    

    public function show()
    {
        $student = Student::where('user_id', Auth::id())->first();

        if (!$student) {
            // Manejar el caso en que no se encuentra el estudiante.
            return redirect()->back()->withErrors('No se ha encontrado el perfil del estudiante.');
        }

        return view('students.show', compact('student'));
    }

    public function uploadDocuments(Request $request)
    {
        $request->validate([
            'document' => 'required|mimes:pdf|max:2048',
        ]);

        $student = Student::where('user_id', Auth::id())->first();

        if (!$student) {
            return redirect()->back()->withErrors('No se ha encontrado el perfil del estudiante.');
        }

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
        $document = Document::where('id', $id)->whereHas('student', function ($query) {
            $query->where('user_id', Auth::id());
        })->firstOrFail();

        return response()->file(storage_path('app/' . $document->path));
    }
}
