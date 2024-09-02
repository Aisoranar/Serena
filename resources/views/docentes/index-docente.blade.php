{{-- resources/views/docentes/index-docente.blade.php --}}
@extends('layouts.app')

@section('title', 'Panel de Docentes')

@section('content')
@auth
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-lg text-gray-700">
                Bienvenido <span class="font-semibold">{{ auth()->user()->name ?? auth()->user()->username }}</span>. 
                Usted se encuentra registrado como 
                <span class="font-semibold">
                    @if(auth()->user()->role === 'student')
                        Estudiante
                    @elseif(auth()->user()->role === 'health_professional')
                        Profesional de la salud
                    @elseif(auth()->user()->role === 'docent')
                        Docente
                    @else
                        {{ ucfirst(auth()->user()->role) }} <!-- Fallback for other roles -->
                    @endif
                </span>.
            </p>
        </div>
    @endauth
    
<div class="container mx-auto py-10 px-6">
    <h1 class="text-4xl font-bold text-center text-blue-900 mb-8">Panel de Docentes</h1>

    <p class="text-lg text-gray-700 text-center mb-6">
        Bienvenido al panel de docentes. Aquí puedes encontrar recursos y guías para apoyar tu trabajo con los estudiantes.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Guía de Caracterización de Estudiantes</h2>
                <p class="text-gray-600">Aprende cómo caracterizar a los estudiantes de manera efectiva para brindarles el apoyo adecuado.</p>
                <a href="#" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-medium">Ver más &rarr;</a>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Herramientas Educativas</h2>
                <p class="text-gray-600">Accede a una variedad de herramientas que te ayudarán en la enseñanza y gestión de tus clases.</p>
                <a href="#" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-medium">Ver más &rarr;</a>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Estrategias de Inclusión</h2>
                <p class="text-gray-600">Descubre estrategias para fomentar la inclusión y participación activa en el entorno educativo.</p>
                <a href="#" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-medium">Ver más &rarr;</a>
            </div>
        </div>
    </div>
</div>
@endsection
