@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Estudiante</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">Nombre</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Apellidos</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="document_type">Tipo de Documento</label>
            <select name="document_type" class="form-control" required>
                <option value="CC">Cédula de Ciudadanía</option>
                <option value="TI">Tarjeta de Identidad</option>
                <option value="CE">Cédula de Extranjería</option>
            </select>
        </div>
        <div class="form-group">
            <label for="document_number">Número de Documento</label>
            <input type="text" name="document_number" class="form-control" required>
        </div>
        <!-- Add other fields here as needed -->
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
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
