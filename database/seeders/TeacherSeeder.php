<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        // Suponiendo que los usuarios correspondientes ya están creados en la tabla 'users'
        $teachers = [
            [
                'user_id' => 1, // Asegúrate de que estos IDs existan en la tabla 'users'
                'first_name' => 'Emily',
                'last_name' => 'Davis',
                'school' => 'Escuela de Ciencias',
                'department' => 'Mathematics Department',
                'position' => 'Professor',
            ],
            [
                'user_id' => 2,
                'first_name' => 'Michael',
                'last_name' => 'Wilson',
                'school' => 'Escuela de Ciencias Sociales y de las Comunicaciones',
                'department' => 'Science Department',
                'position' => 'Lecturer',
            ],
            // Agrega más profesores según sea necesario
        ];

        foreach ($teachers as $teacher) {
            DB::table('teachers')->updateOrInsert(
                [
                    'user_id' => $teacher['user_id'] // Usar user_id como identificador único
                ],
                $teacher
            );
        }
    }
}
