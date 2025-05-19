<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et est admin
        if (auth()->check() && auth()->user()->usertype === 'admin') {
            return $next($request);
        }elseif (auth()->check() && auth()->user()->usertype === 'manager') {
            return $next($request);
        }
    
        // Déconnecte l'utilisateur (optionnel)
        auth()->logout();
    
        // Redirige vers la page de connexion
        return redirect()->route('connexion')->with('error', 'Accès refusé.');
    }
    
}
