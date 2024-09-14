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

    <h1 class="text-2xl font-bold text-text-primary mb-4">Inscription</h1>
    <p class="text-lg text-text-secondary mb-8">Inscrivez-vous pour commencer votre expérience.</p>

    <form method="POST" action="{{ route('inscription.store') }}" class="w-full max-w-md">
        @csrf

        <!-- Nom -->
        <input type="text" name="name" placeholder="Nom" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" >

        <!-- Email -->
        <input type="email" name="email" placeholder="Email" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" >

        <!-- Mot de passe -->
        <input type="password" name="password" placeholder="Mot de passe" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" >
        <input type="password" name="password_confirmation" placeholder="Mot de passe" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" >
        <!-- Numéro de téléphone -->
        <div class="relative mb-4">
            <div class="flex items-center border border-gray-300 rounded-lg">
                <!-- Indicatif international prérempli avec une image -->
                <div class="flex items-center pl-3 pr-2 bg-gray-100 border-r border-gray-300">
                    <img src="{{ asset('images/burkina-faso.png') }}" alt="Burkina Faso Flag" class="w-6 h-4">
                    <span class="mx-2 text-gray-600">+226</span>
                </div>
                <!-- Champ de saisie pour les 8 chiffres restants -->
                <input type="tel" id="phone" name="phone" placeholder="Votre numéro mobile" class="block w-full px-4 py-2 border-0 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" pattern="\d{8}" >
            </div>
        </div>


        <!-- Genre -->
        <select name="gender" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" >
            <option value="" selected>Genre</option>
            <option value="male">Homme</option>
            <option value="female">Femme</option>
        </select>

        <!-- Type d'utilisateur -->
        <fieldset class="mb-4">
            <legend class="text-lg font-medium mb-2">Je suis un(e)</legend>
            <div class="flex items-center mb-2">
                <input type="radio" id="driver" name="role" value="driver" class="h-4 w-4 text-primary700 focus:ring-primary700" >
                <label for="driver" class="ml-2 text-text-secondary">Conducteur</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="passenger" name="role" value="passenger" class="h-4 w-4 text-primary700 focus:ring-primary700" >
                <label for="passenger" class="ml-2 text-text-secondary">Passager</label>
            </div>
        </fieldset>

        <!-- Bouton S'inscrire -->
        <button type="submit" class="w-full py-3 px-6 bg-primary700 text-white mt-4 font-semibold rounded-lg hover:bg-primary800 focus:outline-none focus:ring-2 focus:ring-primary700">
            S'inscrire
        </button>
    </form>
</div>
@endsection
