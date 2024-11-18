@extends('layouts.app-master')

@section('content')
<div class="container mx-auto px-4 py-8">

    <!-- Título principal con color azul oscuro -->
    <h1 class="text-4xl font-bold text-blue-900 text-center mb-6">Historial de Observaciones del Estudiante</h1>

    <!-- Información del estudiante -->
    <div class="bg-blue-900 text-white p-4 rounded-lg shadow-md mb-6">
        <h2 class="text-xl font-semibold">{{ $student->user->first_name }} {{ $student->user->first_lastname }}</h2>
        <p>ID: {{ $student->id }}</p>
    </div>

    <!-- Observaciones -->
    <h3 class="text-2xl font-bold text-blue-900 mb-4">Observaciones:</h3>

    @if ($observations->isEmpty())
        <p class="text-gray-700">No hay observaciones registradas para este estudiante.</p>
    @else
        <ul class="space-y-4">
            @foreach ($observations as $observation)
                <li class="bg-white p-4 rounded-lg shadow-md">
                    <strong class="text-blue-900">
                        {{-- Comprobación de que created_at no sea nulo antes de formatear --}}
                        {{ $observation->created_at ? $observation->created_at->format('d/m/Y H:i') : 'Fecha no disponible' }}:
                    </strong>
                    <p class="text-gray-800 mt-2">{{ $observation->observation }}</p>
                    <small class="text-gray-500 mt-2">Registrado por: {{ $observation->user->first_name }} {{ $observation->user->first_lastname }}</small>
                </li>
            @endforeach
        </ul>
    @endif

    <!-- Formulario para registrar nueva observación -->
    <h3 class="text-2xl font-bold text-blue-900 mt-8 mb-4">Registrar Nueva Observación:</h3>

    <form action="{{ route('students.audit.store', ['id' => $student->id]) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        <!-- Campo oculto para enviar el ID del estudiante -->
        <input type="hidden" name="profile_student_id" value="{{ $student->id }}">

        <div class="mb-4">
            <label for="observation" class="block text-sm font-medium text-gray-700">Observación</label>
            <textarea name="observation" id="observation" rows="4" class="p-3 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
        </div>

        <button type="submit" class="bg-blue-900 text-white px-6 py-3 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full sm:w-auto">
            Registrar Observación
        </button>
    </form>

    <!-- Botón de Volver Atrás -->
    <div class="mt-6 text-center">
        <a href="{{ route('list.students') }}" class="text-blue-900 hover:text-blue-700">
            <button type="button" class="px-6 py-2 bg-gray-300 text-blue-900 rounded-md hover:bg-gray-400 transition-all duration-300">
                Volver Atrás
            </button>
        </a>
    </div>
</div>
@endsection
