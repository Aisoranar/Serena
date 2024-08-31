{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.auth-master')

@section('title', 'Registro de Usuario')

@section('content')
<div class="text-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Registro</h1>
</div>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
        <input type="text" name="name" class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
    </div>
    <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-700">Nombre de Usuario</label>
        <input type="text" name="username" class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
        <input type="email" name="email" class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
    </div>
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input type="password" name="password" class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
    </div>
    <div class="mb-6">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
    </div>
    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">Registrar</button>
</form>

<div class="text-center mt-6">
    <a href="{{ route('login.show') }}" class="text-sm text-blue-600 hover:underline">¿Ya tienes una cuenta? Inicia sesión aquí</a>
</div>
@endsection
