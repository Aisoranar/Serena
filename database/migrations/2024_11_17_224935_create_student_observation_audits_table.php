<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentObservationAuditsTable extends Migration
{
    public function up()
    {
        Schema::create('student_observation_audits', function (Blueprint $table) {
            $table->id(); // Campo ID de la tabla
            $table->foreignId('profile_student_id')->constrained()->onDelete('cascade'); // Relación con el estudiante
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con el usuario
            $table->text('observation'); // El campo de observación
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_observation_audits');
    }
}
