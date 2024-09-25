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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Récupération de l'entrée utilisateur (email ou numéro de téléphone)
        $login = $request->input('login');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Préparation des identifiants
        $credentials = [
            $fieldType => $login,
            'password' => $request->input('password'),
        ];

        // Tentative de connexion avec les identifiants
        if (Auth::attempt($credentials)) {
            // Régénération de la session pour la sécurité
            $request->session()->regenerate();

            // Redirection après connexion réussie
            return redirect()->intended(route(auth()->user()->role === 'passager' ? 'passager.accueil' : 'conducteur.accueil', absolute: false));
        } else {
            // Redirection avec message d'erreur si échec de la connexion
            return back()->withErrors([
                'login' => 'Les identifiants sont incorrects.',
            ]);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
