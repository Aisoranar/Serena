{{-- resources/views/view/list/list.students.blade.php --}}
@extends('layouts.app') {{-- Cambia esto si tu layout tiene otro nombre --}}

@section('content')
<div class="container">
    <h1 class="text-center">Lista de Estudiantes</h1>
    @if ($students->isEmpty())
        <p class="text-center">No hay estudiantes registrados.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Documento</th>
                    <th>Zona</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Programa Académico</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->user->name ?? 'No asignado' }}</td>
                    <td>{{ $student->document_type }}</td>
                    <td>{{ $student->document_number }}</td>
                    <td>{{ $student->zone }}</td>
                    <td>{{ $student->birth_date->format('d/m/Y') }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->academic_program }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
