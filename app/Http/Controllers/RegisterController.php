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
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'username' => 'required|string|max:255|unique:users', // Añade validación para username
    ]);

    // Crea el usuario con los datos validados
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'username' => $request->username, // Añade el username aquí
        'password' => Hash::make($request->password),
        'role' => 'student', // Asigna un rol predeterminado
    ]);

    // Redirige a la página de login con un mensaje de éxito
    return redirect()->route('login.show')->with('success', 'Cuenta creada exitosamente');
}
}
