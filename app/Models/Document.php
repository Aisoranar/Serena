<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents'; // Nombre de la tabla explícito

    protected $fillable = ['filename', 'path', 'student_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
