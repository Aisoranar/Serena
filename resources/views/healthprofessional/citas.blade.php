{{-- resources/views/healthprofessional/citas.blade.php --}}
@extends('layouts.app')

@section('title', 'Citas de Bienestar')

@section('content')
<div class="container">
    <h1>Citas de Bienestar</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('healthprofessional.add_cita', $student->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de la Cita</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="observacion">Observación</label>
            <textarea name="observacion" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Agregar Cita</button>
    </form>

    <h2 class="mt-5">Citas Programadas</h2>
    <ul class="list-group">
        @foreach ($student->citas as $cita)
            <li class="list-group-item">
                <strong>{{ $cita->nombre }}</strong> - {{ $cita->fecha }} <br>
                {{ $cita->observacion }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
