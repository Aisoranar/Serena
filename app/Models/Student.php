<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students'; // Nombre de la tabla explícito

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'document_type',
        'document_number',
        'department_id', // Cambiado a ID en lugar de nombre
        'city_id',       // Cambiado a ID en lugar de nombre
        'zone',
        'birth_date',
        'age',
        'marital_status',
        'has_children',
        'address',
        'phone',
        'email',
        'health_regime',
        'eps_name',
        'sisben_classification',
        'academic_program',
        'schedule',
        'disability',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function department()
    {
        return $this->belongsTo(DepartmentAndCity::class, 'department_id');
    }

    public function city()
    {
        return $this->belongsTo(DepartmentAndCity::class, 'city_id');
    }
}
