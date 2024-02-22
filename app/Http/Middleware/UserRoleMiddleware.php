<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   /*  public function handle(Request $request, Closure $next, $role): Response
    {
        if(Auth::check() && Auth::user()->role == $role) {
            return $next($request);
     
         return response()->view('errors.403');
    } */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();
        $role_id = intval($role);
    
        // Depuración: Imprime los valores de role_id del usuario y el role esperado
       /*  dd($user->role_id, $role_id); */
    
        if ($user && $user->role_id === $role_id) {
            return $next($request);
        }
    
        return response()->view('errors.403');
    }
}
