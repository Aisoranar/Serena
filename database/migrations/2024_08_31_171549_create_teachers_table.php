<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('school', [
                'Escuela de Ciencias',
                'Escuela de Ciencias Sociales y de las Comunicaciones',
                'Escuela Ingeniería Agroindustrial',
                'Escuela Ingeniería Agronómica',
                'Escuela Ingeniería Ambiental y de Saneamiento',
                'Escuela Ingeniería de Producción',
                'Escuela de Medicina Veterinaria y Zootecnia'
            ]);
            $table->string('department');
            $table->string('position');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
