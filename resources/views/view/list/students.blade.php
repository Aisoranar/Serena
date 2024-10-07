@extends('layouts.app-master')

@section('content')
<div class="container mx-auto px-4 py-8" x-data="studentList()">
    <h1 class="text-3xl font-bold text-center mb-6">Lista de Estudiantes</h1>
    @if ($students->isEmpty())
        <p class="text-center text-gray-600">No hay estudiantes registrados.</p>
    @else
    <table class="min-w-full bg-white border border-gray-200 table-auto text-center">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombres</th>
                <th class="px-4 py-2">Discapacidad</th>
                <th class="px-4 py-2">Observación</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($students as $student)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2">{{ $student->id }}</td>
                <td class="px-4 py-2">{{ $student->user->first_name }} {{ $student->user->first_lastname }}</td>

                {{-- Mostrar discapacidad como campo editable si es superadmin --}}
                <td class="px-4 py-2">
                    @if (auth()->user()->role === 'superadmin')
                        <input 
                            type="text" 
                            value="{{ $student->disability }}" 
                            id="disability-{{ $student->id }}" 
                            class="border-gray-300 rounded-md text-center"
                        >
                    @else
                        {{ $student->disability }}
                    @endif
                </td>

                <td class="px-4 py-2">{{ $student->observation }}</td>
                <td class="px-4 py-2">
                    <button 
                        id="btnObservation"
                        class="text-yellow-500 hover:text-yellow-700"
                        onclick="openModal({{ $student->id }}, '{{ $student->observation }}', '{{ $student->disability }}')"
                    >
                        <i class="fas fa-edit"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Modal -->
    <div 
        id="modal-observation"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold mb-4">Actualizar Información</h2>
            <form action="{{ route('profile.updateStudentObservation') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="student_id" name="student_id">
            
                {{-- Campo editable de Observación --}}
                <div class="mb-4">
                    <label for="observation" class="block text-sm font-medium text-gray-700">Nueva Observación</label>
                    <input 
                        type="text" 
                        id="observation" 
                        name="observation" 
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                </div>
            
                {{-- Campo editable de discapacidad --}}
@if (auth()->user()->role === 'superadmin')
<div class="mb-4">
    <label for="disability" class="block text-sm font-medium text-gray-700">Discapacidad</label>
    
    {{-- Select para escoger una discapacidad existente --}}
    <select 
        id="disability" 
        name="disability" 
        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
        onchange="toggleDisabilityInput(this)">
        <option value="" disabled selected>Seleccione una discapacidad</option>
        <option value="Visual">Visual</option>
        <option value="Auditiva">Auditiva</option>
        <option value="Motriz">Motriz</option>
        <option value="Cognitiva">Cognitiva</option>
        <option value="Intelectual">Intelectual</option>
        <option value="Psicosocial">Psicosocial</option>
        <option value="Lenguaje y comunicación">Lenguaje y comunicación</option>
        <option value="Discapacidad múltiple">Discapacidad múltiple</option>
        <option value="Otra">Otra</option> {{-- Opción para agregar una nueva discapacidad --}}
    </select>

    {{-- Campo de entrada para nueva discapacidad, se mostrará solo si se selecciona "Otra" --}}
    <input 
        type="text" 
        id="new-disability" 
        name="new_disability" 
        placeholder="Escriba una nueva discapacidad"
        class="mt-2 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
        style="display: none;" {{-- Oculto inicialmente --}}
    >
</div>
@endif            
                <div class="flex justify-end">
                    <button 
                        type="button" 
                        onclick="closeModal()"
                        class="mr-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Cancelar
                    </button>
                    <button 
                        type="submit" 
                        class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Actualizar
                    </button>
                </div>
            </form>
            
        </div>
    </div>

    @endif
</div>
@endsection

<script>
    const openModal = (studentId, observation, disability) => {
        document.getElementById('student_id').value = studentId;
        document.getElementById('observation').value = observation;

        // Solo actualizar discapacidad si el campo está presente (superadmin)
        const disabilityInput = document.getElementById('disability');
        if (disabilityInput) {
            disabilityInput.value = disability;
        }

        document.getElementById('modal-observation').classList.remove('hidden');
    }

    const closeModal = () => {
        document.getElementById('modal-observation').classList.add('hidden');
    }

// Función para mostrar/ocultar el campo de texto para nueva discapacidad
function toggleDisabilityInput(selectElement) {
    var newDisabilityInput = document.getElementById('new-disability');
    if (selectElement.value === 'Otra') {
        newDisabilityInput.style.display = 'block';
    } else {
        newDisabilityInput.style.display = 'none';
    }
}
</script>
