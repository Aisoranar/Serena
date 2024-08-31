<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Student $student)
    {
        return $user->role === 'health_professional' || $user->id === $student->user_id;
    }

    public function update(User $user, Student $student)
    {
        return $user->role === 'health_professional' || $user->id === $student->user_id;
    }

    public function delete(User $user, Student $student)
    {
        return $user->role === 'health_professional';
    }
}
