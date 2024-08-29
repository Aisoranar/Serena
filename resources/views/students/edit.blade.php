{{-- resources/views/students/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Estudiante</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">Nombre</label>
            <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Apellidos</label>
            <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="document_type">Tipo de Documento</label>
            <select name="document_type" class="form-control" required>
                <option value="CC" {{ $student->document_type == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                <option value="TI" {{ $student->document_type == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                <option value="CE" {{ $student->document_type == 'CE' ? 'selected' : '' }}>Cédula de Extranjería</option>
            </select>
        </div>
        <div class="form-group">
            <label for="document_number">Número de Documento</label>
            <input type="text" name="document_number" class="form-control" value="{{ $student->document_number }}" required>
        </div>
        <!-- Continúa con los demás campos... -->
        <button type="submit" class="btn btn-success mt-3">Actualizar</button>
    </form>
</div>
@endsection
