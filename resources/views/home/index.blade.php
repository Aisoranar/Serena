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
            <p class="text-lg text-gray-700">Bienvenido <span class="font-semibold">{{ auth()->user()->name ?? auth()->user()->username }}</span>, estás autenticado en la página.</p>
            <form action="{{ route('logout') }}" method="POST" class="mt-4 inline-block">
                @csrf
                <button type="submit" class="bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-red-700 transition duration-300">Cerrar sesión</button>
            </form>
        </div>
    @endauth

    @guest
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <p class="text-lg text-gray-700">Para ver el contenido, <a href="{{ route('login.show') }}" class="text-blue-600 hover:underline">Inicia Sesión</a>.</p>
        </div>
    @endguest
</div>
@endsection
