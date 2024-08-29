<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Muestra la vista de login
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    // Maneja la lógica de login
    public function login(Request $request)
    {
        // Validaciones de los campos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        // Valida las credenciales y redirige según el resultado
        if (Auth::attempt($credentials)) {
            // Regenerar la sesión para evitar fijación de sesión
            $request->session()->regenerate();

            // Redirige al usuario autenticado
            return redirect()->route('home');
        }

        // Si las credenciales son incorrectas, regresa con un error
        return back()->withErrors([
            'email' => 'Usuario y/o contraseña incorrectos.',
        ]);
    }

    // Cierra la sesión del usuario
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalida la sesión actual
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.show');
    }
}
