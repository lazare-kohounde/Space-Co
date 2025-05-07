<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('client.connexion');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if ($request->user()->usertype === 'admin') {
            # code...
            return redirect()->intended(route('dashboard', absolute: false));
        }

        return redirect()->intended(route('accueil', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
{
    // Récupérer l'utilisateur connecté AVANT la déconnexion
    $user = $request->user();

    // Déconnexion
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirection selon le type d'utilisateur
    if ($user && in_array($user->usertype, ['admin', 'superadmin'])) {
        return redirect()->route('connexion');
    }

    return redirect()->route('accueil'); // page d'accueil pour les autres
}

}
