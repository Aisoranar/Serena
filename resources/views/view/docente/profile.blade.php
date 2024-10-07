@extends('layouts.app-master')

@section('title', 'Editar Perfil Estudiante')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 max-w-4xl m-auto">Perfil del Docente</h1>
        @if (session('success'))
            <div id="success-message"
                class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 transition-opacity duration-1000 opacity-100 max-w-4xl m-auto">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="flex gap-4 justify-end max-w-4xl m-auto">
            <!-- Botón para habilitar el modo de edición -->
            <button id="edit-button" class="bg-blue-500 text-white px-4 py-2 mb-6 rounded" onclick="enableEdit()">Editar
                Perfil</button>

            <!-- Botón para cancelar el modo de edición (oculto inicialmente) -->
            <button id="cancel-button" class="bg-red-500 text-white px-4 py-2 mb-6 rounded hidden"
                onclick="cancelEdit()">Cancelar Edición</button>
        </div>

        <div class="max-w-4xl m-auto">
            <form action="{{ route('profile.updateDocente', $data['docente']->user_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Cada input con su respectivo label -->
                    <div>
                        <label for="first_name" class="block text-gray-700">Primer Nombre</label>
                        <input type="text" id="first_name" name="first_name"
                            value="{{ $data['docente']->user->first_name }}" class="border border-gray-300 p-2 w-full"
                            disabled>
                    </div>

                    <div>
                        <label for="second_name" class="block text-gray-700">Segundo Nombre</label>
                        <input type="text" id="second_name" name="second_name"
                            value="{{ $data['docente']->user->second_name }}" class="border border-gray-300 p-2 w-full"
                            disabled>
                    </div>

                    <div>
                        <label for="first_lastname" class="block text-gray-700">Primer Apellido</label>
                        <input type="text" id="first_lastname" name="first_lastname"
                            value="{{ $data['docente']->user->first_lastname }}" class="border border-gray-300 p-2 w-full"
                            disabled>
                    </div>

                    <div>
                        <label for="second_lastname" class="block text-gray-700">Segundo Apellido</label>
                        <input type="text" id="second_lastname" name="second_lastname"
                            value="{{ $data['docente']->user->second_lastname }}" class="border border-gray-300 p-2 w-full"
                            disabled>
                    </div>

                    <div>
                        <label for="school" class="block text-gray-700">Seleccione Escuela</label>
                        <select name="school" id="school" class="border rounded p-2" disabled>
                            <option value="">Seleccione una escuela</option>
                            <option value="Escuela de Ciencias"
                                {{ $data['docente']->school == 'Escuela de Ciencias' ? 'selected' : '' }}>Escuela de
                                Ciencias</option>
                            <option value="Escuela de Ciencias Sociales y de las Comunicaciones"
                                {{ $data['docente']->school == 'Escuela de Ciencias Sociales y de las Comunicaciones' ? 'selected' : '' }}>
                                Escuela de Ciencias Sociales y de las Comunicaciones</option>
                            <option value="Escuela Ingeniería Agroindustrial"
                                {{ $data['docente']->school == 'Escuela Ingeniería Agroindustrial' ? 'selected' : '' }}>
                                Escuela Ingeniería Agroindustrial</option>
                            <option value="Escuela Ingeniería Agronómica"
                                {{ $data['docente']->school == 'Escuela Ingeniería Agronómica' ? 'selected' : '' }}>Escuela
                                Ingeniería Agronómica</option>
                            <option value="Escuela Ingeniería Ambiental y de Saneamiento"
                                {{ $data['docente']->school == 'Escuela Ingeniería Ambiental y de Saneamiento' ? 'selected' : '' }}>
                                Escuela Ingeniería Ambiental y de Saneamiento</option>
                            <option value="Escuela Ingeniería de Producción"
                                {{ $data['docente']->school == 'Escuela Ingeniería de Producción' ? 'selected' : '' }}>
                                Escuela Ingeniería de Producción</option>
                            <option value="Escuela de Medicina Veterinaria y Zootecnia"
                                {{ $data['docente']->school == 'Escuela de Medicina Veterinaria y Zootecnia' ? 'selected' : '' }}>
                                Escuela de Medicina Veterinaria y Zootecnia</option>
                        </select>
                    </div>

                    <div>
                        <label for="department_id" class="block text-gray-700">Departamento</label>
                        <select id="department_id" name="department_id" class="border border-gray-300 p-2 w-full" disabled>
                            <option value="">Selecciona un departamento</option>
                            @foreach ($data['departments'] as $departmentGroup)
                                @foreach ($departmentGroup as $department)
                                    <option value="{{ $department->id }}" {{ $department->id == $data['docente']->department_id ? 'selected' : '' }}>
                                        {{ $department->department }}, {{ $department->city }}
                                    </option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Botón de Actualizar (solo visible en modo edición) -->
                    <button id="update-button" type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded hidden w-full mt-4">Actualizar Perfil</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.classList.add('opacity-0');
                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 1000); // Tiempo para que termine la transición
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        });


        function enableEdit() {
            console.log('Habilitar edición');
            // Habilitar todos los inputs excepto nombres y apellidos
            document.getElementById('school').disabled = false;
            document.getElementById('department_id').disabled = false;

            // Mostrar botones de actualizar y cancelar
            const updateButton = document.getElementById('update-button');
            const cancelButton = document.getElementById('cancel-button');
            const editButton = document.getElementById('edit-button');

            updateButton.classList.remove('hidden');
            cancelButton.classList.remove('hidden');
            editButton.classList.add('hidden');

            // Deshabilitar botón de edición
            document.getElementById('edit-button').disabled = true;
        }

        function cancelEdit() {
            // Deshabilitar todos los inputs
            document.getElementById('school').disabled = true;
            document.getElementById('department_id').disabled = true;

            // Ocultar botones de actualizar y cancelar
            document.getElementById('update-button').classList.add('hidden');
            document.getElementById('cancel-button').classList.add('hidden');

            // Habilitar botón de edición
            const editButton = document.getElementById('edit-button');
            editButton.classList.remove('hidden');
            editButton.disabled = false;
        }
    </script>
    <style>
        .transition-opacity {
            transition: opacity 1s ease-in-out;
        }
    </style>
@endsection
