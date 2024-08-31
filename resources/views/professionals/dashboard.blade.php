{{-- resources/views/professionals/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Panel de Estadísticas')

@section('content')
<div class="container">
    <h1>Panel de Estadísticas</h1>

    <h3>Estadísticas Generales</h3>
    <ul class="list-group">
        <li class="list-group-item">Total de Usuarios Registrados: {{ $totalUsuarios }}</li>
        <li class="list-group-item">Carrera Más Común: {{ $carreraMasComun }}</li>
        <li class="list-group-item">Edad Promedio: {{ $edadPromedio }}</li>
        <li class="list-group-item">Discapacidad Más Común: {{ $discapacidadMasComun }}</li>
        <li class="list-group-item">Porcentaje de Citas Agregadas: {{ $porcentajeCitas }}%</li>
    </ul>
</div>
@endsection
