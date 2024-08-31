@extends('layouts.app')

@section('title', 'Subir Documentos')

@section('content')
<div class="container">
    <h1>Subir Documentos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('students.upload_documents', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="document">Subir Documento (PDF)</label>
            <input type="file" name="document" class="form-control" accept=".pdf" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Subir</button>
    </form>

    <h2 class="mt-5">Documentos Subidos</h2>
    <ul class="list-group">
        @foreach ($student->documents as $document)
            <li class="list-group-item">
                <a href="{{ route('students.view_document', $document->id) }}">{{ $document->filename }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
