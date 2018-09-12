<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SoloRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        $usuario = Auth::user();
        if(!$usuario) {
            return redirect('/login');
        }

        if($usuario->rol != $rol) {
            return redirect('/tareas');
        }

        return $next($request);
    }
}
