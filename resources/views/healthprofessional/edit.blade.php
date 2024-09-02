{{-- resources/views/healthprofessional/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Editar Estudiante')

@section('content')
<div class="container mx-auto my-8 px-4">
    <h1 class="text-3xl font-bold text-blue-800 mb-4">Editar Estudiante</h1>

    <form action="{{ route('healthprofessional.update', $student->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-group">
                <label for="first_name" class="block text-gray-700">Nombre</label>
                <input type="text" name="first_name" class="form-control w-full mt-1 border-gray-300 rounded-md" value="{{ old('first_name', $student->first_name) }}" required>
            </div>
            <div class="form-group">
                <label for="last_name" class="block text-gray-700">Apellidos</label>
                <input type="text" name="last_name" class="form-control w-full mt-1 border-gray-300 rounded-md" value="{{ old('last_name', $student->last_name) }}" required>
            </div>
            <div class="form-group">
                <label for="document_type" class="block text-gray-700">Tipo de Documento</label>
                <select name="document_type" class="form-control w-full mt-1 border-gray-300 rounded-md" required>
                    <option value="CC" {{ old('document_type', $student->document_type) == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                    <option value="TI" {{ old('document_type', $student->document_type) == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                    <option value="CE" {{ old('document_type', $student->document_type) == 'CE' ? 'selected' : '' }}>Cédula de Extranjería</option>
                </select>
            </div>
            <div class="form-group">
                <label for="document_number" class="block text-gray-700">Número de Documento</label>
                <input type="text" name="document_number" class="form-control w-full mt-1 border-gray-300 rounded-md" value="{{ old('document_number', $student->document_number) }}" required>
            </div>
            <!-- Añadir otros campos necesarios -->
        </div>
        <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition">
            Actualizar
        </button>
    </form>
</div>
@endsection
