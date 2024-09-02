<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthProfessional extends Model
{
    use HasFactory;

    protected $table = 'health_professionals'; // Nombre de la tabla explícito

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'department',
        'specialization',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
