@extends('layouts.main')

@section('content')
<div class="flex flex-col items-center justify-between h-screen p-6 bg-gray-100">
    <!-- Partie supérieure -->
    <div class="flex flex-col items-center mb-auto">
        <img src="{{ asset('images/WelcomeScreen.svg') }}" alt="Bienvenue" class="w-76 h-auto mb-6 max-w-screen-lg">

        <h1 class="text-3xl font-bold text-text-primary mb-2">Bienvenue</h1> 
        <p class="text-lg text-center text-text-secondary mb-8">Découvrez une expérience de partage améliorée</p>
    </div>

    <!-- Boutons -->
    <div class="flex flex-col w-full max-w-sm space-y-4 mb-3"> <!-- Ajout de margin-bottom pour l'espacement -->
        <!-- Bouton Créer un compte -->
        <a href="{{ route('register') }}" class="block text-center py-3 px-6 bg-primary700 text-white font-semibold rounded-lg">Créer un compte</a>

        <!-- Bouton Se connecter -->
        <a href="{{ route('login') }}" class="block text-center mt-0.5 py-3 px-6 border border-primary700 text-primary700 font-semibold rounded-lg">Se connecter</a>
    </div>
</div>
@endsection
