<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileDocent extends Model
{
    use HasFactory;

    // Campos que pueden ser masivamente asignados
    protected $fillable = [
        'user_id',
        'department_id',
        'city_id',
        'school',
        'position', // Si deseas agregar el cargo (posición) del docente
    ];

    /**
     * Relación con el usuario (un docente pertenece a un usuario)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el departamento (un docente pertenece a un departamento)
     * Se utiliza el campo department_id como clave foránea
     */
    public function department()
    {
        return $this->belongsTo(DepartmentAndCity::class, 'department_id');
    }

    /**
     * Relación con la ciudad (un docente pertenece a una ciudad)
     * Se utiliza el campo city_id como clave foránea
     */
    public function city()
    {
        return $this->belongsTo(DepartmentAndCity::class, 'city_id');
    }

    /**
     * Crear un perfil de docente a partir de un usuario
     * @param User $user
     * @param array $data
     * @return ProfileDocent
     */
    public static function createFromUser(User $user, array $data)
    {
        // Fusionamos los datos del formulario con el ID del usuario
        return self::create(array_merge($data, [
            'user_id' => $user->id,
        ]));
    }
}
