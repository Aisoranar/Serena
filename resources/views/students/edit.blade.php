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

<div class="form-group">
    <label for="disability">Tipo de Discapacidad</label>
    <select name="disability" id="disability" class="form-control" required>
        <option value="">Seleccione una opción</option>
        <option value="Discapacidad auditiva">Discapacidad auditiva</option>
        <option value="Discapacidad física">Discapacidad física</option>
        <option value="Discapacidad intelectual">Discapacidad intelectual</option>
        <option value="Discapacidad visual">Discapacidad visual</option>
        <option value="Discapacidad Sordoceguera">Discapacidad Sordoceguera</option>
        <option value="Discapacidad psicosocial">Discapacidad psicosocial</option>
        <option value="Discapacidad múltiple">Discapacidad múltiple</option>
        <option value="Trastorno de Espectro Autista - TEA">Trastorno de Espectro Autista - TEA</option>
    </select>
    <small id="disability-description" class="form-text text-muted mt-2"></small>
</div>

<script>
    const descriptions = {
        "Discapacidad auditiva": "Personas con deficiencias en la percepción de sonidos...",
        "Discapacidad física": "Personas con deficiencias corporales...",
        "Discapacidad intelectual": "Deficiencias en capacidades mentales generales...",
        "Discapacidad visual": "Deficiencias para percibir luz, forma, tamaño y color...",
        "Discapacidad Sordoceguera": "Discapacidad única con deficiencias visuales y auditivas...",
        "Discapacidad psicosocial": "Deficiencias relacionadas con alteraciones en el pensamiento...",
        "Discapacidad múltiple": "Presencia de dos o más deficiencias asociadas...",
        "Trastorno de Espectro Autista - TEA": "Trastornos del desarrollo neurológico con alteraciones en la interacción social..."
    };

    document.getElementById('disability').addEventListener('change', function() {
        const description = descriptions[this.value] || '';
        document.getElementById('disability-description').innerText = description;
    });
</script>

@endsection
