<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentAndCity extends Model
{
    public function studentsByDepartment()
    {
        return $this->hasMany(Student::class, 'department_id');
    }

    public function studentsByCity()
    {
        return $this->hasMany(Student::class, 'city_id');
    }
}
