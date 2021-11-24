<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = auth()->user()->role;

        if ($userRole !== $role) {

            if ($userRole === 'escola') {
                return route('home');
            }

            if ($userRole === 'secretaria') {
                return route('home');
            }
        }
        return $next($request);
    }
}
