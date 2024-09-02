<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Verifica si el usuario está autenticado y si su rol coincide con el requerido
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Si no tiene el rol correcto, redirige a una página de error o a home
        return redirect('/')->with('error', 'Acceso no autorizado');
    }
}
