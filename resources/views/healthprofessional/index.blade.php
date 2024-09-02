{{-- resources/views/healthprofessional/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Listado de Estudiantes')

@section('content')
<div class="container mx-auto my-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-blue-800">Listado de Estudiantes</h1>
        <a href="{{ route('healthprofessional.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 flex items-center">
            <i class="fas fa-plus-circle mr-2"></i> Agregar Estudiante
        </a>
    </div>

    <!-- Barra de Búsqueda -->
    <div class="mb-6">
        <input type="text" placeholder="Buscar estudiante..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" />
    </div>

    <!-- Tabla de Estudiantes -->
    <div class="overflow-hidden rounded-lg shadow-md bg-white">
        <table class="min-w-full bg-white">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left font-semibold uppercase">Nombre</th>
                    <th class="py-3 px-6 text-left font-semibold uppercase">Documento</th>
                    <th class="py-3 px-6 text-left font-semibold uppercase">Ciudad</th>
                    <th class="py-3 px-6 text-center font-semibold uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($students as $student)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="py-4 px-6">{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td class="py-4 px-6">{{ $student->document_type }}: {{ $student->document_number }}</td>
                        <td class="py-4 px-6">{{ $student->city->city ?? 'No especificada' }}</td>
                        <td class="py-4 px-6 text-center space-x-2">
                            <a href="{{ route('healthprofessional.show', $student->id) }}" class="bg-green-500 text-white px-4 py-2 rounded shadow-md hover:bg-green-600 transition">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('healthprofessional.edit', $student->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded shadow-md hover:bg-yellow-600 transition">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('healthprofessional.destroy', $student->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow-md hover:bg-red-600 transition" onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-4 px-6 text-center text-gray-500">No se encontraron estudiantes.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-6">
        {{ $students->links('pagination::tailwind') }}
    </div>
</div>
@endsection
