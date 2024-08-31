{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Bienvenido a SERENA')

@section('content')
<div class="bg-gradient-to-b from-blue-900 to-green-500 min-h-screen flex flex-col items-center justify-center text-white">
    
    <!-- Hero Section -->
    <section class="text-center">
        <h1 class="text-5xl font-extrabold mb-6 animate-fade-in">
            Bienvenido a <span class="text-white">SERENA</span>
        </h1>
        <p class="text-xl mb-8 max-w-2xl mx-auto leading-relaxed animate-slide-in">
            Una plataforma inteligente para la gestión de estudiantes de UNIPAZ, con el objetivo de optimizar el seguimiento y la inclusión educativa.
        </p>
        <a href="{{ route('login.show') }}" class="bg-white text-blue-900 font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 animate-bounce">
            Iniciar Sesión
        </a>
    </section>

    <!-- Information Section -->
    <section class="container mx-auto mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 px-4 animate-slide-up">
        <!-- Inicio Card -->
        <div class="bg-white bg-opacity-90 rounded-lg shadow-lg p-6 text-gray-900 hover:bg-opacity-100 transition-all duration-300 transform hover:scale-105">
            <h2 class="text-2xl font-semibold mb-4">Inicio</h2>
            <p class="text-lg">Descubre la funcionalidad de SERENA, una plataforma diseñada para facilitar el acceso y gestión de información estudiantil.</p>
            <a href="#inicio" class="text-blue-600 hover:underline mt-4 block">Ver más</a>
        </div>

        <!-- Docentes Card -->
        <div class="bg-white bg-opacity-90 rounded-lg shadow-lg p-6 text-gray-900 hover:bg-opacity-100 transition-all duration-300 transform hover:scale-105">
            <h2 class="text-2xl font-semibold mb-4">Docentes</h2>
            <p class="text-lg">Accede a recursos y guías diseñados para docentes, que ayudan en la caracterización y acompañamiento de los estudiantes.</p>
            <a href="#docentes" class="text-blue-600 hover:underline mt-4 block">Ver más</a>
        </div>

        <!-- Estudiantes Card -->
        <div class="bg-white bg-opacity-90 rounded-lg shadow-lg p-6 text-gray-900 hover:bg-opacity-100 transition-all duration-300 transform hover:scale-105">
            <h2 class="text-2xl font-semibold mb-4">Estudiantes</h2>
            <p class="text-lg">Conoce las estrategias y consejos para fomentar la inclusión y participación activa en el entorno educativo.</p>
            <a href="#estudiantes" class="text-blue-600 hover:underline mt-4 block">Ver más</a>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="mt-24 text-center text-sm text-gray-200">
        &copy; 2024 SERENA. Todos los derechos reservados.
    </footer>
</div>
@endsection
