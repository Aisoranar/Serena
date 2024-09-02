{{-- resources/views/healthprofessional/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalle del Estudiante')

@section('content')
<div class="container mx-auto my-8 px-4">
    <h1 class="text-3xl font-bold text-blue-800 mb-4">Detalle del Estudiante</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-xl font-semibold mb-2">Información Personal</h2>
                <p><strong>Nombre:</strong> {{ $student->first_name }} {{ $student->last_name }}</p>
                <p><strong>Tipo de Documento:</strong> {{ $student->document_type }}</p>
                <p><strong>Número de Documento:</strong> {{ $student->document_number }}</p>
                <p><strong>Ciudad:</strong> {{ $student->city->city ?? 'No especificada' }}</p>
                <p><strong>Dirección:</strong> {{ $student->address }}</p>
                <p><strong>Teléfono:</strong> {{ $student->phone }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Información Adicional</h2>
                <p><strong>Departamento:</strong> {{ $student->department->department ?? 'No especificado' }}</p>
                <p><strong>Zona:</strong> {{ $student->zone }}</p>
                <p><strong>Régimen de Salud:</strong> {{ $student->health_regime }}</p>
                <p><strong>EPS:</strong> {{ $student->eps_name ?? 'No especificada' }}</p>
                <p><strong>Discapacidad:</strong> {{ $student->disability ?? 'Ninguna' }}</p>
            </div>
        </div>
        <a href="{{ route('healthprofessional.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
            Volver
        </a>
    </div>
</div>
@endsection
