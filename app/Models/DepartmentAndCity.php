<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentAndCity extends Model
{
    use HasFactory;

    protected $table = 'departments_and_cities'; // Nombre de la tabla correcto

    protected $fillable = ['department', 'city'];

    public function studentsByDepartment()
    {
        return $this->hasMany(Student::class, 'department_id');
    }

    public function studentsByCity()
    {
        return $this->hasMany(Student::class, 'city_id');
    }
}
