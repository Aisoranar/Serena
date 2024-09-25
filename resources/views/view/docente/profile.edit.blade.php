@extends('layouts.app-master')

@section('content')

    <div class="container mt-4">
        <h1>Editar Perfil del Docente</h1>

        <!-- Formulario para editar el perfil del docente -->
        <form action="{{ route('docente.perfil.update', ['id' => $docente->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo de la escuela -->
            <div class="form-group mb-3">
                <label for="school"><strong>Escuela:</strong></label>
                <select name="school" id="school" class="form-control" required>
                    <option value="Escuela de Ciencias" {{ $docente->school == 'Escuela de Ciencias' ? 'selected' : '' }}>Escuela de Ciencias</option>
                    <option value="Escuela de Ciencias Sociales y de las Comunicaciones" {{ $docente->school == 'Escuela de Ciencias Sociales y de las Comunicaciones' ? 'selected' : '' }}>Escuela de Ciencias Sociales y de las Comunicaciones</option>
                    <!-- Añadir las demás opciones según sea necesario -->
                </select>
            </div>

            <!-- Campo del departamento -->
            <div class="form-group mb-3">
                <label for="department"><strong>Departamento:</strong></label>
                <input type="text" name="department" id="department" class="form-control" value="{{ old('department', $docente->department?->department) }}" required>
            </div>

            <!-- Campo de la ciudad -->
            <div class="form-group mb-3">
                <label for="city"><strong>Ciudad:</strong></label>
                <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $docente->city?->city) }}" required>
            </div>

            <!-- Campo de la posición -->
            <div class="form-group mb-3">
                <label for="position"><strong>Posición:</strong></label>
                <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $docente->position) }}" required>
            </div>

            <!-- Botón para guardar los cambios -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

@endsection
