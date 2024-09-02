{{-- resources/views/home/index.blade.php --}}
@extends('layouts.app-master')

@section('title', 'Inicio')

@section('content')
<div class="container mx-auto px-4 py-10 animate-fade-in">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Bienvenido a SERENA</h1>
    </div>

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

    @guest
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <p class="text-lg text-gray-700">Para ver el contenido, <a href="{{ route('login.show') }}" class="text-blue-600 hover:underline">Inicia Sesión</a>.</p>
        </div>
    @endguest
</div>
@endsection
