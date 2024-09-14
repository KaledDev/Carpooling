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

        <h1 class="text-2xl font-bold text-text-primary mb-6">Inscription</h1>

        <form method="POST" action="{{ route('register') }}" class="w-full max-w-md">
            @csrf

            <!-- Nom -->
            <label for="name" :value="__('Name')" />
            <input type="text" name="name" placeholder="Nom" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" :value="old('name')" required autofocus autocomplete="name">

            <!-- Email -->
            <label for="email" :value="__('Email')" />
            <input type="email" name="email" placeholder="Email" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" :value="old('email')" required autocomplete="username">

            <!-- Mot de passe -->
            <label for="password" :value="__('Password')" />
            <input type="password" name="password" placeholder="Mot de passe" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" required autocomplete="new-password">

            <!-- Confirmation Mot de passe -->
            <label for="password_confirmation" :value="__('Confirm Password')" />
            <input type="password" name="password_confirmation" placeholder="Confirmez le mot de passe" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" required autocomplete="new-password">

            <!-- Numéro de téléphone -->
            <div class="relative mb-4">
                <div class="flex items-center border border-gray-300 rounded-lg">
                    <div class="flex items-center pl-3 pr-2 bg-gray-100 border-r border-gray-300">
                        <img src="{{ asset('images/burkina-faso.png') }}" alt="Burkina Faso Flag" class="w-6 h-4">
                        <span class="mx-2 text-text-primary">+226</span>
                    </div>
                    <input type="text" id="phone" name="phone" placeholder="Votre numéro mobile" class="block w-full px-4 py-2 border-0 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" pattern="\d{8}" required>
                </div>
            </div>

            <!-- Genre -->
            <select name="gender" class="block w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" required>
                <option value="" selected>Genre</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>

            <!-- Type d'utilisateur -->
            <fieldset class="mb-4">
                <legend class="text-lg font-medium mb-2">Je suis un(e)</legend>
                <div class="flex items-center mb-2">
                    <input type="radio" id="conducteur" name="role" value="conducteur" class="h-4 w-4 text-primary700 focus:ring-primary700" required>
                    <label for="conducteur" class="ml-2 text-text-primary">Conducteur</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="passager" name="role" value="passager" class="h-4 w-4 text-primary700 focus:ring-primary700" required>
                    <label for="passager" class="ml-2 text-text-primary">Passager</label>
                </div>
            </fieldset>

            <!-- Bouton S'inscrire -->
            <button class="w-full py-3 px-6 bg-primary700 text-white mt-4 font-semibold rounded-lg hover:bg-primary800 focus:outline-none focus:ring-2 focus:ring-primary700">
                {{ __('S\'inscrire') }}
            </button>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-text-primary" href="{{ route('login') }}">
                    {{ __('Déja inscrit?') }}
                </a>
            </div>
        </form>
    </div>
    @endsection