@extends('layouts.app')

@section('title', 'Perfil del Estudiante')

@section('content')
<div class="container">
    <h1>Perfil del Estudiante</h1>

    @if($student)
        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>Nombre:</strong> {{ $student->first_name }} {{ $student->last_name }}</li>
            <li class="list-group-item"><strong>Documento:</strong> {{ $student->document_type }} {{ $student->document_number }}</li>
            <li class="list-group-item"><strong>Ciudad:</strong> {{ $student->city }}</li>
        </ul>

        <h2>Subir Documentos</h2>
        <form action="{{ route('students.upload_documents') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="document">Documento (PDF)</label>
                <input type="file" name="document" class="form-control" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Subir</button>
        </form>

        <h3 class="mt-5">Documentos Subidos</h3>
        <ul class="list-group">
            @foreach ($student->documents as $document)
                <li class="list-group-item">
                    <a href="{{ route('students.view_document', $document->id) }}">{{ $document->filename }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No se ha encontrado el perfil del estudiante.</p>
    @endif
</div>
@endsection
