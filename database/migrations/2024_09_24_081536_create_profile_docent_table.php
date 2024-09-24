<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profile_docents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained('departments_and_cities')->onDelete('cascade');
            $table->foreignId('city_id')->nullable()->constrained('departments_and_cities')->onDelete('cascade');

            $table->enum('school', [
                'Escuela de Ciencias',
                'Escuela de Ciencias Sociales y de las Comunicaciones',
                'Escuela Ingeniería Agroindustrial',
                'Escuela Ingeniería Agronómica',
                'Escuela Ingeniería Ambiental y de Saneamiento',
                'Escuela Ingeniería de Producción',
                'Escuela de Medicina Veterinaria y Zootecnia'
            ])->nullable();

            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_docents');
    }
};
