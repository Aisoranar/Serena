@extends('layouts.app-master')

@section('title', 'Editar Perfil Estudiante')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Editar Perfil del Estudiante</h1>

    <!-- Botón para abrir el modal de edición -->
    <button onclick="openEditModal()" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-200 mb-4">
        Editar Perfil
    </button>

    <!-- Mostrar información del perfil -->
    <div id="profile-info">
        <p><strong>Primer Nombre:</strong> {{ $profile->user->first_name }}</p>
        <p><strong>Segundo Nombre:</strong> {{ $profile->user->second_name }}</p>
        <p><strong>Primer Apellido:</strong> {{ $profile->user->first_lastname }}</p>
        <p><strong>Segundo Apellido:</strong> {{ $profile->user->second_lastname }}</p>
        <p><strong>Tipo de Documento:</strong> {{ $profile->document_type }}</p>
        <p><strong>Número de Documento:</strong> {{ $profile->document_number }}</p>
        <p><strong>Zona:</strong> {{ $profile->zone }}</p>
        <p><strong>Fecha de Nacimiento:</strong> {{ $profile->birth_date }}</p>
        <p><strong>Edad:</strong> {{ $profile->age }}</p>
        <p><strong>Estado Civil:</strong> {{ $profile->marital_status }}</p>
        <p><strong>¿Tiene Hijos?:</strong> {{ $profile->has_children ? 'Sí' : 'No' }}</p>
        <p><strong>Dirección:</strong> {{ $profile->address }}</p>
        <p><strong>Teléfono:</strong> {{ $profile->phone }}</p>
        <p><strong>Departamento:</strong> {{ $profile->department->department ?? '' }}</p>
        <p><strong>Ciudad:</strong> {{ $profile->city->city ?? '' }}</p>
        <p><strong>Régimen de Salud:</strong> {{ $profile->health_regime }}</p>
        <p><strong>Programa Académico:</strong> {{ $profile->academic_program }}</p>
        <p><strong>Horario:</strong> {{ $profile->schedule }}</p>
        <p><strong>Discapacidad:</strong> {{ $profile->disability }}</p>
    </div>
</div>

<!-- Modal -->
<div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h2 class="text-xl font-semibold">Editar Perfil</h2>
                <button onclick="closeEditModal()" class="text-gray-600 hover:text-gray-800">&times;</button>
            </div>
            <div class="p-6">
                <form id="editProfileForm">
                    @csrf
                    @method('PUT')

                    <!-- Campos del formulario -->
                    <!-- Tipo de Documento -->
                    <div class="mb-4">
                        <label for="document_type" class="block text-sm font-medium text-gray-700">Tipo de Documento</label>
                        <select id="document_type" name="document_type" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="">Seleccione</option>
                            <option value="CC">CC</option>
                            <option value="TI">TI</option>
                            <option value="CE">CE</option>
                        </select>
                    </div>

                    <!-- Número de Documento -->
                    <div class="mb-4">
                        <label for="document_number" class="block text-sm font-medium text-gray-700">Número de Documento</label>
                        <input type="text" id="document_number" name="document_number" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <!-- Zona -->
                    <div class="mb-4">
                        <label for="zone" class="block text-sm font-medium text-gray-700">Zona</label>
                        <select id="zone" name="zone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="">Seleccione</option>
                            <option value="Urbana">Urbana</option>
                            <option value="Rural">Rural</option>
                        </select>
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div class="mb-4">
                        <label for="birth_date_modal" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                        <input type="date" id="birth_date_modal" name="birth_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required oninput="calculateAgeModal()">
                    </div>

                    <!-- Edad -->
                    <div class="mb-4">
                        <label for="age_modal" class="block text-sm font-medium text-gray-700">Edad</label>
                        <input type="number" id="age_modal" name="age" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" readonly>
                    </div>

                    <!-- Estado Civil -->
                    <div class="mb-4">
                        <label for="marital_status" class="block text-sm font-medium text-gray-700">Estado Civil</label>
                        <select id="marital_status" name="marital_status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="">Seleccione</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Unión Libre">Unión Libre</option>
                            <option value="Viudo">Viudo</option>
                        </select>
                    </div>

                    <!-- ¿Tiene Hijos? -->
                    <div class="mb-4">
                        <label for="has_children" class="block text-sm font-medium text-gray-700">¿Tiene Hijos?</label>
                        <select id="has_children" name="has_children" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="">Seleccione</option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <!-- Dirección -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
                        <input type="text" id="address" name="address" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <!-- Teléfono -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="text" id="phone" name="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <!-- Departamento -->
                    <div class="mb-4">
                        <label for="department_id_modal" class="block text-sm font-medium text-gray-700">Departamento</label>
                        <select id="department_id_modal" name="department_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required onchange="updateCitiesModal()">
                            <option value="">Seleccione un departamento</option>
                            @foreach($departments as $department => $cities)
                                <option value="{{ $cities[0]->id }}" data-cities="{{ $cities->toJson() }}">
                                    {{ $department }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Ciudad -->
                    <div class="mb-4">
                        <label for="city_id_modal" class="block text-sm font-medium text-gray-700">Ciudad</label>
                        <select id="city_id_modal" name="city_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="">Seleccione una ciudad</option>
                        </select>
                    </div>

                    <!-- Régimen de Salud -->
                    <div class="mb-4">
                        <label for="health_regime" class="block text-sm font-medium text-gray-700">Régimen de Salud</label>
                        <input type="text" id="health_regime" name="health_regime" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <!-- Programa Académico -->
                    <div class="mb-4">
                        <label for="academic_program" class="block text-sm font-medium text-gray-700">Programa Académico</label>
                        <input type="text" id="academic_program" name="academic_program" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <!-- Horario -->
                    <div class="mb-4">
                        <label for="schedule" class="block text-sm font-medium text-gray-700">Horario</label>
                        <select id="schedule" name="schedule" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="">Seleccione</option>
                            <option value="Diurno">Diurno</option>
                            <option value="Nocturno">Nocturno</option>
                        </select>
                    </div>

                    <!-- Discapacidad -->
                    <div class="mb-4">
                        <label for="disability" class="block text-sm font-medium text-gray-700">Discapacidad</label>
                        <input type="text" id="disability" name="disability" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    </div>

                    <!-- Botón de Guardar -->
                    <div class="flex justify-end">
                        <button type="button" onclick="submitEditForm()" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
                            Guardar Cambios
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    let profileId = {{ $profile->user_id }};

    function openEditModal() {
        // Mostrar el modal
        document.getElementById('editModal').classList.remove('hidden');

        // Obtener los datos del perfil
        fetch(`/student/edit-modal/${profileId}`)
            .then(response => response.json())
            .then(data => {
                populateModalForm(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function closeEditModal() {
        // Ocultar el modal
        document.getElementById('editModal').classList.add('hidden');
    }

    function populateModalForm(data) {
        // Llenar los campos del formulario con los datos del perfil
        document.getElementById('document_type').value = data.profile.document_type;
        document.getElementById('document_number').value = data.profile.document_number;
        document.getElementById('zone').value = data.profile.zone;
        document.getElementById('birth_date_modal').value = data.profile.birth_date;
        document.getElementById('age_modal').value = data.profile.age;
        document.getElementById('marital_status').value = data.profile.marital_status;
        document.getElementById('has_children').value = data.profile.has_children ? '1' : '0';
        document.getElementById('address').value = data.profile.address;
        document.getElementById('phone').value = data.profile.phone;
        document.getElementById('email').value = data.profile.email;
        document.getElementById('health_regime').value = data.profile.health_regime;
        document.getElementById('academic_program').value = data.profile.academic_program;
        document.getElementById('schedule').value = data.profile.schedule;
        document.getElementById('disability').value = data.profile.disability;

        // Seleccionar el departamento y cargar las ciudades
        const departmentSelect = document.getElementById('department_id_modal');
        for (let i = 0; i < departmentSelect.options.length; i++) {
            if (departmentSelect.options[i].value == data.profile.department_id) {
                departmentSelect.selectedIndex = i;
                break;
            }
        }
        updateCitiesModal(data.profile.city_id);
    }

    function submitEditForm() {
    // Obtener el formulario y los datos
    const form = document.getElementById('editProfileForm');
    const formData = new FormData(form);

    // Enviar la solicitud POST al servidor usando fetch
    fetch(`/student/update-modal/${profileId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF para la autenticación
            'Accept': 'application/json',
        },
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la solicitud al servidor');
        }
        return response.json();
    })
    .then(data => {
        console.log('Respuesta del servidor:', data);

        // Verificar si la respuesta indica éxito
        if (data.success) {
            // Cerrar el modal y actualizar la información del perfil
            closeEditModal();
            // Puedes actualizar los datos del perfil directamente sin recargar la página
            document.getElementById('profile-info').innerHTML = `
                <p><strong>Primer Nombre:</strong> ${data.profile.user.first_name}</p>
                <p><strong>Segundo Nombre:</strong> ${data.profile.user.second_name}</p>
                <p><strong>Primer Apellido:</strong> ${data.profile.user.first_lastname}</p>
                <p><strong>Segundo Apellido:</strong> ${data.profile.user.second_lastname}</p>
                <p><strong>Tipo de Documento:</strong> ${data.profile.document_type}</p>
                <p><strong>Número de Documento:</strong> ${data.profile.document_number}</p>
                <p><strong>Zona:</strong> ${data.profile.zone}</p>
                <p><strong>Fecha de Nacimiento:</strong> ${data.profile.birth_date}</p>
                <p><strong>Edad:</strong> ${data.profile.age}</p>
                <p><strong>Estado Civil:</strong> ${data.profile.marital_status}</p>
                <p><strong>¿Tiene Hijos?:</strong> ${data.profile.has_children ? 'Sí' : 'No'}</p>
                <p><strong>Dirección:</strong> ${data.profile.address}</p>
                <p><strong>Teléfono:</strong> ${data.profile.phone}</p>
                <p><strong>Departamento:</strong> ${data.profile.department.department ?? ''}</p>
                <p><strong>Ciudad:</strong> ${data.profile.city.city ?? ''}</p>
                <p><strong>Régimen de Salud:</strong> ${data.profile.health_regime}</p>
                <p><strong>Programa Académico:</strong> ${data.profile.academic_program}</p>
                <p><strong>Horario:</strong> ${data.profile.schedule}</p>
                <p><strong>Discapacidad:</strong> ${data.profile.disability}</p>
            `;
        } else {
            console.error('Error al guardar los cambios:', data);
            alert('Error al guardar los cambios.');
        }
    })
    .catch(error => {
        console.error('Error en el envío del formulario:', error);
        alert('Ocurrió un error al intentar guardar los cambios.');
    });
}


    function calculateAgeModal() {
        const birthDateInput = document.getElementById('birth_date_modal');
        const ageInput = document.getElementById('age_modal');

        if (birthDateInput.value) {
            const birthDate = new Date(birthDateInput.value);
            const today = new Date();

            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            ageInput.value = age;
        } else {
            ageInput.value = '';
        }
    }

    function updateCitiesModal(selectedCityId = null) {
        const departmentSelect = document.getElementById('department_id_modal');
        const citySelect = document.getElementById('city_id_modal');

        // Limpiar las opciones de ciudad
        citySelect.innerHTML = '<option value="">Seleccione una ciudad</option>';

        // Obtener las ciudades del departamento seleccionado
        const selectedDepartmentOption = departmentSelect.options[departmentSelect.selectedIndex];
        const cities = selectedDepartmentOption ? JSON.parse(selectedDepartmentOption.getAttribute('data-cities')) : [];

        // Agregar las ciudades al select
        cities.forEach(city => {
            const option = document.createElement('option');
            option.value = city.id;
            option.textContent = city.city;
            citySelect.appendChild(option);
        });

        // Seleccionar la ciudad si se proporciona
        if (selectedCityId) {
            citySelect.value = selectedCityId;
        }
    }
</script>
@endsection
