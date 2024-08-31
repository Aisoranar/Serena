<?php
// app/Console/Commands/UpdatePasswords.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswords extends Command
{
    protected $signature = 'update:passwords';
    protected $description = 'Actualiza las contraseñas de los usuarios a Bcrypt si no están correctamente cifradas';

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Si la contraseña necesita ser re-hasheada
            if (!Hash::needsRehash($user->password)) {
                continue;
            }

            // Re-hash de la contraseña existente
            $user->password = Hash::make($user->password);
            $user->save();
        }

        $this->info('Contraseñas actualizadas a Bcrypt correctamente.');
    }
}
