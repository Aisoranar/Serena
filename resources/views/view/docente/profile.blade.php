@extends('layouts.app-master')

@section('content')

    <div class="container mt-4">

        <h1 class="mb-4">Perfil del Docente</h1>

        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Datos Personales</h3>

                <!-- Nombres y apellidos del docente (en formato de formulario) -->
                <div class="form-group mb-3">
                    <label for="first_name"><strong>Primer Nombre:</strong></label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $docente->user->first_name ?? 'N/A' }}" readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="second_name"><strong>Segundo Nombre:</strong></label>
                    <input type="text" class="form-control" id="second_name" name="second_name" value="{{ $docente->user->second_name ?? 'N/A' }}" readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="first_lastname"><strong>Primer Apellido:</strong></label>
                    <input type="text" class="form-control" id="first_lastname" name="first_lastname" value="{{ $docente->user->first_lastname ?? 'N/A' }}" readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="second_lastname"><strong>Segundo Apellido:</strong></label>
                    <input type="text" class="form-control" id="second_lastname" name="second_lastname" value="{{ $docente->user->second_lastname ?? 'N/A' }}" readonly>
                </div>

                <h3 class="mt-4 mb-3">Datos Profesionales</h3>

                <!-- Datos del perfil docente (en formato de formulario) -->
                <div class="form-group mb-3">
                    <label for="school"><strong>Escuela a la que pertenece:</strong></label>
                    <input type="text" class="form-control" id="school" name="school" value="{{ $docente->school }}" readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="department"><strong>Departamento:</strong></label>
                    @if ($docente->department?->department)
                        <input type="text" class="form-control" id="department" name="department" value="{{ $docente->department?->department }}" readonly>
                    @else
                        <select class="form-control" id="department" name="department" disabled>
                            <option value="">Hola1</option>
                            <option value="">Hola2</option>
                            <option value="">Hola3</option>
                        </select>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="city"><strong>Ciudad:</strong></label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ $docente->city?->city ?? 'N/A' }}" readonly>
                </div>

                <!-- Botón para editar el perfil del docente -->
                <a href="{{ route('docente.perfil.edit', ['id' => $docente->id]) }}" class="btn btn-primary mt-3">
                    Editar Perfil
                </a>

            </div>
        </div>

    </div>

@endsection
