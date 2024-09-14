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

        <!-- Titre -->
        <h1 class="text-2xl font-bold text-text-primary mb-4">Réinitialisation du mot de passe</h1>
        <p class="text-lg text-text-secondary mb-8">
            {{ __('Entrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.') }}
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Formulaire de réinitialisation du mot de passe -->
        <form method="POST" action="{{ route('password.email') }}" class="w-full max-w-md">
            @csrf

            <!-- Adresse e-mail -->
            <input type="email" name="email" id="email" placeholder="Adresse e-mail" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- Bouton Envoyer le lien de réinitialisation -->
            <button type="submit" class="w-full mt-6 py-3 px-6 bg-primary700 text-white font-semibold rounded-lg hover:bg-primary800 focus:outline-none focus:ring-2 focus:ring-primary700">
                {{ __('Envoyer le lien de réinitialisation') }}
            </button>
        </form>
    </div>
    @endsection
