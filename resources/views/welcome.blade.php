{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Bienvenido a SERENA')

@section('content')
<div class="container">
    <h1>Bienvenido a SERENA</h1>
    <p>Esta es la plataforma de información de estudiantes de UNIPAZ. Aquí puedes encontrar datos personales, seguimiento y hoja de ruta de cada estudiante.</p>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#inicio" data-toggle="tab">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#docentes" data-toggle="tab">Docentes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#estudiantes" data-toggle="tab">Estudiantes</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="inicio">
            <p>Información sobre el aplicativo SERENA y su funcionalidad.</p>
            <p>Este sistema permite a los profesionales de la salud y estudiantes gestionar y visualizar información importante, asegurando una mejor inclusión y seguimiento.</p>
        </div>
        <div class="tab-pane fade" id="docentes">
            <p>En esta sección los docentes encontrarán guías y recursos sobre rutas de caracterización, así como herramientas educativas para mejorar la experiencia de aprendizaje.</p>
            <ul>
                <li>Guías para caracterización de estudiantes.</li>
                <li>Recursos para facilitar la inclusión en círculos de aprendizaje.</li>
                <li>Acceso a herramientas y técnicas de apoyo educativo.</li>
            </ul>
        </div>
        <div class="tab-pane fade" id="estudiantes">
            <p>Aquí se presentan estrategias, consejos y tips diseñados para fomentar la inclusión de los estudiantes en los círculos de aprendizaje.</p>
            <ul>
                <li>Consejos para mejorar la interacción social y académica.</li>
                <li>Estrategias de aprendizaje inclusivo.</li>
                <li>Acceso a recursos y apoyo especializado.</li>
            </ul>
        </div>
    </div>

    <a href="{{ route('login.show') }}" class="btn btn-primary mt-3">Ingresar</a>
</div>
@endsection
