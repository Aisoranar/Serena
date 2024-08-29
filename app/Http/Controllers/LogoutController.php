<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // Maneja el cierre de sesión
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidar la sesión y redirigir al login
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.show');
    }
}
