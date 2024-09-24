<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profile_students', function (Blueprint $table) {
            // Campos de relación
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('department_id')->constrained('departments_and_cities')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('departments_and_cities')->onDelete('cascade');

            // Campos adicionales del perfil
            $table->enum('document_type', ['CC', 'TI', 'CE']);
            $table->string('document_number')->unique();
            $table->enum('zone', ['Rural', 'Urbana']);
            $table->date('birth_date');
            $table->integer('age');
            $table->enum('marital_status', ['Soltero', 'Casado', 'Unión Libre', 'Viudo']);
            $table->boolean('has_children')->default(false);
            $table->string('address');
            $table->string('phone');
            $table->enum('health_regime', ['Contributivo EPS', 'Subsidiado Sisbén', 'Régimen especial', 'Medicina prepagada', 'Ninguna']);
            $table->string('eps_name')->nullable();
            $table->enum('sisben_classification', ['A', 'B', 'C', 'D'])->nullable();
            $table->enum('academic_program', [
                'Administración de Negocios Internacionales',
                'Comunicación Social',
                'Ingeniería Agroindustrial',
                'Ingeniería Agronómica',
                'Ingeniería de Producción',
                'Ingeniería Informática',
                'Licenciatura en Artes',
                'Medicina Veterinaria y Zootecnia',
                'Técnico profesional en Operación del Transporte Multimodal',
                'Química',
                'Tecnología en Operación de Sistemas Electromecánicos',
                'Tecnología en Logística de Transporte Multimodal',
                'Ingeniería Ambiental y de Saneamiento',
                'Tecnología en Seguridad y Salud en el Trabajo',
                'Tecnología en Obras Civiles',
                'Trabajo Social',
                'Tecnología en Procesamiento de Alimentos',
                'Ingeniería en Seguridad y Salud en el Trabajo',
                'Especialización Tecnológica en Control de Calidad de Biocombustibles Líquidos',
                'Especialización en Gerencia de Proyectos Culturales',
                'Especialización en Agronegocios'
            ]);
            $table->enum('schedule', ['Diurno', 'Nocturno']);
            $table->text('disability')->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_students');
    }
};
