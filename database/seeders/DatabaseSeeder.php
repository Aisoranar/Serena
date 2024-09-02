<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Primero, se debe crear usuarios
            UserSeeder::class,
            
            // Luego, se crean los estudiantes y profesores
            StudentSeeder::class,
            TeacherSeeder::class,
        ]);
    }
}
