<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'user_id' => 1, // Asegúrate de que estos IDs existan en la tabla 'users'
                'department_id' => 1, // Asegúrate de que estos IDs existan en la tabla 'departments_and_cities'
                'city_id' => 1, // Asegúrate de que estos IDs existan en la tabla 'departments_and_cities'
                'first_name' => 'Alice',
                'last_name' => 'Johnson',
                'document_type' => 'CC',
                'document_number' => '123456789',
                'zone' => 'Urbana',
                'birth_date' => '2000-01-01',
                'age' => 24,
                'marital_status' => 'Soltero',
                'has_children' => false,
                'address' => '123 Main St',
                'phone' => '1234567890',
                'email' => 'alice.johnson@example.com',
                'health_regime' => 'Contributivo EPS',
                'eps_name' => 'EPS Example',
                'sisben_classification' => 'A',
                'academic_program' => 'Ingeniería Informática',
                'schedule' => 'Diurno',
                'disability' => null,
            ],
            [
                'user_id' => 2,
                'department_id' => 2,
                'city_id' => 2,
                'first_name' => 'Bob',
                'last_name' => 'Smith',
                'document_type' => 'TI',
                'document_number' => '987654321',
                'zone' => 'Rural',
                'birth_date' => '1999-05-15',
                'age' => 25,
                'marital_status' => 'Casado',
                'has_children' => true,
                'address' => '456 Elm St',
                'phone' => '0987654321',
                'email' => 'bob.smith@example.com',
                'health_regime' => 'Subsidiado Sisbén',
                'eps_name' => 'Sisbén Example',
                'sisben_classification' => 'B',
                'academic_program' => 'Ingeniería Agroindustrial',
                'schedule' => 'Nocturno',
                'disability' => 'Ninguna',
            ],
            // Agrega más estudiantes según sea necesario
        ];

        foreach ($students as $student) {
            DB::table('students')->updateOrInsert(
                [
                    'document_number' => $student['document_number'] // Usar document_number como identificador único
                ],
                $student
            );
        }
    }
}
