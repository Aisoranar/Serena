@extends('layouts.app-master') <!-- Usamos app-master para la estructura principal -->

@section('title', 'Editar Perfil Estudiante')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Editar Perfil del Estudiante</h1>

    <form action="{{ route('student.update', $profile->user_id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Primer Nombre -->
        <div class="mb-4">
            <label for="first_name" class="block text-sm font-medium text-gray-700">Primer Nombre</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $profile->user->first_name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required disabled>
        </div>

        <!-- Segundo Nombre -->
        <div class="mb-4">
            <label for="second_name" class="block text-sm font-medium text-gray-700">Segundo Nombre</label>
            <input type="text" id="second_name" name="second_name" value="{{ old('second_name', $profile->user->second_name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" disabled>
        </div>

        <!-- Primer Apellido -->
        <div class="mb-4">
            <label for="first_lastname" class="block text-sm font-medium text-gray-700">Primer Apellido</label>
            <input type="text" id="first_lastname" name="first_lastname" value="{{ old('first_lastname', $profile->user->first_lastname) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required disabled>
        </div>

        <!-- Segundo Apellido -->
        <div class="mb-4">
            <label for="second_lastname" class="block text-sm font-medium text-gray-700">Segundo Apellido</label>
            <input type="text" id="second_lastname" name="second_lastname" value="{{ old('second_lastname', $profile->user->second_lastname) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" disabled>
        </div>

        <!-- Fecha de Nacimiento -->
        <div class="mb-4">
            <label for="birth_date" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
            <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $profile->birth_date) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" oninput="calculateAge()" required>
        </div>

        <!-- Edad -->
        <div class="mb-4">
            <label for="age" class="block text-sm font-medium text-gray-700">Edad</label>
            <input type="number" id="age" name="age" value="{{ old('age', $profile->age) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <div class="mb-4">
            <label for="marital_status" class="block text-sm font-medium text-gray-700">Estado Civil</label>
            <input type="text" id="marital_status" name="marital_status" value="{{ old('marital_status', $profile->marital_status) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <div class="mb-4">
            <label for="has_children" class="block text-sm font-medium text-gray-700">¿Tiene Hijos?</label>
            <input type="text" id="has_children" name="has_children" value="{{ old('has_children', $profile->has_children ? 'Sí' : 'No') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
            <input type="text" id="address" name="address" value="{{ old('address', $profile->address) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <!-- Departamento -->
<div class="mb-4">
    <label for="department_id" class="block text-sm font-medium text-gray-700">Departamento</label>
    <select id="department_id" name="department_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" onchange="updateCities()">
        <option value="">Seleccione un departamento</option>
        @foreach($departments as $department => $cities)
            <optgroup label="{{ $department }}">
                <option value="{{ $cities[0]->department }}" data-cities="{{ json_encode($cities) }}">
                    {{ $department }}
                </option>
            </optgroup>
        @endforeach
    </select>
</div>

<!-- Ciudad -->
<div class="mb-4">
    <label for="city_id" class="block text-sm font-medium text-gray-700">Ciudad</label>
    <select id="city_id" name="city_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
        <option value="">Seleccione una ciudad</option>
    </select>
</div>




        <div class="mb-4">
            <label for="health_regime" class="block text-sm font-medium text-gray-700">Régimen de Salud</label>
            <input type="text" id="health_regime" name="health_regime" value="{{ old('health_regime', $profile->health_regime) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <div class="mb-4">
            <label for="eps_name" class="block text-sm font-medium text-gray-700">Nombre de la EPS</label>
            <input type="text" id="eps_name" name="eps_name" value="{{ old('eps_name', $profile->eps_name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <div class="mb-4">
            <label for="sisben_classification" class="block text-sm font-medium text-gray-700">Clasificación Sisbén</label>
            <input type="text" id="sisben_classification" name="sisben_classification" value="{{ old('sisben_classification', $profile->sisben_classification) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <div class="mb-4">
            <label for="academic_program" class="block text-sm font-medium text-gray-700">Programa Académico</label>
            <input type="text" id="academic_program" name="academic_program" value="{{ old('academic_program', $profile->academic_program) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <div class="mb-4">
            <label for="schedule" class="block text-sm font-medium text-gray-700">Horario</label>
            <input type="text" id="schedule" name="schedule" value="{{ old('schedule', $profile->schedule) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <div class="mb-4">
            <label for="disability" class="block text-sm font-medium text-gray-700">Discapacidad</label>
            <input type="text" id="disability" name="disability" value="{{ old('disability', $profile->disability) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">Actualizar</button>
    </form>
</div>

<script>
    function calculateAge() {
        const birthDateInput = document.getElementById('birth_date');
        const ageInput = document.getElementById('age');

        if (birthDateInput.value) {
            const birthDate = new Date(birthDateInput.value);
            const today = new Date();

            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();

            // Si no ha llegado el cumpleaños este año, restar un año a la edad
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            ageInput.value = age; // Actualiza el campo de edad
        } else {
            ageInput.value = ''; // Si no hay fecha de nacimiento, vacía el campo de edad
        }
    }

    function updateCities() {
        const departmentSelect = document.getElementById('department_id');
        const citySelect = document.getElementById('city_id');

        // Limpiar las opciones de ciudad
        citySelect.innerHTML = '<option value="">Seleccione una ciudad</option>';

        // Obtener las ciudades del departamento seleccionado
        const selectedDepartment = departmentSelect.options[departmentSelect.selectedIndex];
        const cities = selectedDepartment ? JSON.parse(selectedDepartment.getAttribute('data-cities')) : [];

        // Agregar las ciudades al select
        cities.forEach(city => {
            const option = document.createElement('option');
            option.value = city.id;
            option.textContent = city.city;
            citySelect.appendChild(option);
        });
    }
</script>

@endsection
