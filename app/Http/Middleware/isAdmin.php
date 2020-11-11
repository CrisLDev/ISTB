<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class isAdmin
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

        if ($role != 'admin') {
            return redirect('/home')->with('messageError', '¡No eres admin puto!');
        }

        return $next($request);
    }
}
