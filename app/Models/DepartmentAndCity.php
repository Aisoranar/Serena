<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentAndCity extends Model
{
    protected $table = 'departments_and_cities'; // Especifica el nombre correcto de la tabla

    protected $fillable = ['department', 'city'];
}
