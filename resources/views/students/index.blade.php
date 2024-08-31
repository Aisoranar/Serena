@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Estudiantes</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Agregar Estudiante</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->document_type }}: {{ $student->document_number }}</td>
                    <td>{{ $student->city }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
</div>
@endsection
