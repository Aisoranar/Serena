<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Muestra la vista de registro
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    // Maneja la lógica de registro
    public function register(Request $request)
    {
        // Validaciones de los campos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Crea el usuario con los datos validados y encripta la contraseña
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Importante: Encripta la contraseña con Bcrypt
            'role' => 'student', // Asigna un rol predeterminado
        ]);

        Auth::login($user); // Loguear automáticamente después del registro
        return redirect()->route('home')->with('success', 'Cuenta creada exitosamente');
    }
}
