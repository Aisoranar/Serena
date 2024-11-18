<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentObservationAudit extends Model
{
    use HasFactory;

    // Define la tabla si el nombre no sigue la convención
    protected $table = 'student_observation_audits'; // Si el nombre de la tabla es diferente

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'profile_student_id', // ID del estudiante
        'user_id', // ID del usuario que hizo la observación
        'observation', // La observación misma
    ];

    // Relaciones con otros modelos

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class); // Un estudiante tiene un usuario asociado
    }

    // Relación con el modelo ProfileStudent
    public function profileStudent()
    {
        return $this->belongsTo(ProfileStudent::class, 'profile_student_id');
    }
}
