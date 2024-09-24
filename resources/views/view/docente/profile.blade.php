@extends('layouts.app-master')

@section('content')

    <div class="container mt-4">

        <h1 class="mb-4">Perfil del Docente</h1>

        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Datos Personales</h3>
  
                <!-- Nombres y apellidos del docente (desde la tabla 'users') -->
                <p><strong>Primer Nombre:</strong> {{ $docente->user->first_name ?? 'N/A' }}</p>
                <p><strong>Segundo Nombre:</strong> {{ $docente->user->second_name ?? 'N/A' }}</p>
                <p><strong>Primer Apellido:</strong> {{ $docente->user->first_lastname ?? 'N/A' }}</p>
                <p><strong>Segundo Apellido:</strong> {{ $docente->user->second_lastname ?? 'N/A' }}</p>

                <h3 class="mt-4 mb-3">Datos Profesionales</h3>

                <!-- Datos del perfil docente -->
                <p><strong>Escuela a la que pertenece:</strong> {{ $docente->school }}</p>
                @if ($docente->department?->department)
                    <p><strong>Departamento:</strong> {{ $docente->department?->department }}</p>
                @else
                 <select name="" id="">
                    <option value="">Hola1</option>
                    <option value="">Hola2</option>
                    <option value="">Hola3</option>
                 </select>
                @endif
                <p><strong>Ciudad:</strong> {{ $docente->city?->city ?? 'N/A' }}</p>

                <!-- Botón para editar el perfil del docente -->
                <a href="{{ route('docente.perfil.edit', ['id' => $docente->id]) }}" class="btn btn-primary mt-3">
                    Editar Perfil
                </a>

            </div>
        </div>

    </div>

@endsection
