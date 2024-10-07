<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department_id',
        'city_id',
        'document_type',
        'document_number',
        'zone',
        'birth_date',
        'age',
        'marital_status',
        'has_children',
        'address',
        'phone',
        'health_regime',
        'eps_name',
        'sisben_classification',
        'academic_program',
        'schedule',
        'disability',
        'first_name',         // Añadido
        'second_name',        // Añadido
        'first_lastname',     // Añadido
        'second_lastname',    // Añadido
        'observation',
    ];

    // Relación con el usuario (muchos a uno)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el departamento (muchos a uno)
    public function department()
    {
        return $this->belongsTo(DepartmentAndCity::class, 'department_id');
    }

    // Relación con la ciudad (muchos a uno)
    public function city()
    {
        return $this->belongsTo(DepartmentAndCity::class, 'city_id');
    }

    // Accesor para formatear la fecha de nacimiento
    public function getFormattedBirthDateAttribute()
    {
        return $this->birth_date->format('d/m/Y');
    }

    // Método para crear un perfil de estudiante a partir de un usuario
    public static function createFromUser(User $user, array $data)
    {
        return self::create(array_merge($data, [
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'second_name' => $user->second_name,
            'first_lastname' => $user->first_lastname,
            'second_lastname' => $user->second_lastname,
        ]));
    }
}
