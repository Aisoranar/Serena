<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas'; // Asegúrate de que el nombre de la tabla es correcto

    protected $fillable = ['nombre', 'fecha', 'observacion', 'student_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
