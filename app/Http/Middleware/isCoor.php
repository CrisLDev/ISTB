<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class isCoor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $role = auth()->user()->role;

        if ($role == 'user') {
            return redirect('/home')->with('messageError', '¡No tienes permisos!');
        }

        return $next($request);
    }
}
