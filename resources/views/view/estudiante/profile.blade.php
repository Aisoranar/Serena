@extends('layouts.app-master')

@section('title', 'Editar Perfil Estudiante')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Perfil del Estudiante</h1>

    <!-- Mostrar información del perfil -->
    <div id="profile-info">
        <p><strong>Primer Nombre:</strong> {{ $profile->user->first_name }}</p>
        <p><strong>Segundo Nombre:</strong> {{ $profile->user->second_name }}</p>
        <p><strong>Primer Apellido:</strong> {{ $profile->user->first_lastname }}</p>
        <p><strong>Segundo Apellido:</strong> {{ $profile->user->second_lastname }}</p>
        <p><strong>Tipo de Documento:</strong> {{ $profile->document_type }}</p>
        <p><strong>Número de Documento:</strong> {{ $profile->document_number }}</p>
        <p><strong>Zona:</strong> {{ $profile->zone }}</p>
        <p><strong>Fecha de Nacimiento:</strong> {{ $profile->birth_date }}</p>
        <p><strong>Edad:</strong> {{ $profile->age }}</p>
        <p><strong>Estado Civil:</strong> {{ $profile->marital_status }}</p>
        <p><strong>¿Tiene Hijos?:</strong> {{ $profile->has_children ? 'Sí' : 'No' }}</p>
        <p><strong>Dirección:</strong> {{ $profile->address }}</p>
        <p><strong>Teléfono:</strong> {{ $profile->phone }}</p>
        <p><strong>Departamento:</strong> {{ $profile->department->department ?? '' }}</p>
        <p><strong>Ciudad:</strong> {{ $profile->city->city ?? '' }}</p>
        <p><strong>Régimen de Salud:</strong> {{ $profile->health_regime }}</p>
        <p><strong>Programa Académico:</strong> {{ $profile->academic_program }}</p>
        <p><strong>Horario:</strong> {{ $profile->schedule }}</p>
        <p><strong>Discapacidad:</strong> {{ $profile->disability }}</p>
    </div>
</div>
@endsection
