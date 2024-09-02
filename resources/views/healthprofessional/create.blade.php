{{-- resources/views/healthprofessional/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Agregar Estudiante')

@section('content')
<div class="container mx-auto my-8 px-4">
    <h1 class="text-3xl font-bold text-blue-800 mb-4">Agregar Estudiante</h1>

    <form action="{{ route('healthprofessional.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-group">
                <label for="first_name" class="block text-gray-700">Nombre</label>
                <input type="text" name="first_name" class="form-control w-full mt-1 border-gray-300 rounded-md" required>
            </div>
            <div class="form-group">
                <label for="last_name" class="block text-gray-700">Apellidos</label>
                <input type="text" name="last_name" class="form-control w-full mt-1 border-gray-300 rounded-md" required>
            </div>
            <div class="form-group">
                <label for="document_type" class="block text-gray-700">Tipo de Documento</label>
                <select name="document_type" class="form-control w-full mt-1 border-gray-300 rounded-md" required>
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CE">Cédula de Extranjería</option>
                </select>
            </div>
            <div class="form-group">
                <label for="document_number" class="block text-gray-700">Número de Documento</label>
                <input type="text" name="document_number" class="form-control w-full mt-1 border-gray-300 rounded-md" required>
            </div>
            <!-- Añadir otros campos necesarios -->
        </div>
        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
            Guardar
        </button>
    </form>
</div>
@endsection
