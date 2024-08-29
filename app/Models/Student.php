<?php

// app/Models/Student.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'document_type',
        'document_number',
        'department',
        'city',
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
}
