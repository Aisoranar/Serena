{{-- resources/views/students/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Perfil del Estudiante')

@section('content')
<div class="container mx-auto my-8 px-4">
    <h1 class="text-3xl font-bold text-blue-800 mb-4">Perfil del Estudiante</h1>

    @if($student)
        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>Nombre:</strong> {{ $student->first_name }} {{ $student->last_name }}</li>
            <li class="list-group-item"><strong>Documento:</strong> {{ $student->document_type }} {{ $student->document_number }}</li>
            <li class="list-group-item"><strong>Ciudad:</strong> {{ $student->city->city ?? 'No especificada' }}</li>
        </ul>

        <h2 class="text-2xl font-semibold text-blue-600 mt-6">Subir Documentos</h2>
        <form action="{{ route('students.upload_documents') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="document" class="block text-gray-700">Documento (PDF)</label>
                <input type="file" name="document" class="form-control w-full mt-1 border-gray-300 rounded-md" accept=".pdf" required>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition mt-3">Subir</button>
        </form>

        <h3 class="text-xl font-semibold text-blue-600 mt-8">Documentos Subidos</h3>
        <ul class="list-group mt-3">
            @foreach ($student->documents as $document)
                <li class="list-group-item">
                    <a href="{{ route('students.view_document', $document->id) }}" class="text-blue-600 hover:underline">{{ $document->filename }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-red-600">No se ha encontrado el perfil del estudiante.</p>
    @endif
</div>
@endsection
