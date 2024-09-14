@extends('layouts.main')

@section('content')
<div class="flex flex-col items-center justify-center h-screen p-6">

    <!-- Barre de retour -->
    <div class="absolute top-4 left-4 flex items-center">
        <a href="{{ route('appWelcome') }}" class="flex items-center text-gray-600 hover:text-gray-800">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
    </div>

    <h1 class="text-2xl font-bold text-text-primary mb-4">Connexion</h1>
    <p class="text-lg text-text-secondary mb-8">Connectez-vous pour accéder à votre compte.</p>

    <form method="POST" action="{{ route('login') }}" class="w-full max-w-md">
        @csrf

        <!-- Email ou Numéro de téléphone -->
        <input type="text" name="login" placeholder="Email ou Numéro de téléphone" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" :value="old('login')" required autofocus />

        <!-- Mot de passe -->
        <input type="password" name="password" placeholder="Mot de passe" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" required />

        <!-- Mot de passe oublié -->
        <div class="flex mt-8 items-center justify-between mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="h-4 w-4 text-primary700 focus:ring-primary700" />
                <span class="ml-2 text-text-secondary">Se souvenir de moi</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-primary700 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif
        </div>

        <!-- Bouton Se connecter -->
        <button type="submit" class="w-full mt-6 py-3 px-6 bg-primary700 text-white font-semibold rounded-lg hover:bg-primary800 focus:outline-none focus:ring-2 focus:ring-primary700">
            Se connecter
        </button>
    </form>
</div>
@endsection
