@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Estudiante</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $student->first_name }} {{ $student->last_name }}</li>
        <li class="list-group-item"><strong>Tipo de Documento:</strong> {{ $student->document_type }}</li>
        <li class="list-group-item"><strong>Número de Documento:</strong> {{ $student->document_number }}</li>
        <li class="list-group-item"><strong>Ciudad:</strong> {{ $student->city }}</li>
        <li class="list-group-item"><strong>Dirección:</strong> {{ $student->address }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $student->phone }}</li>
        <!-- Add other fields here as needed -->
    </ul>

    <a href="{{ route('students.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection
