@extends('layouts.main')

@section('content')
    <!-- Flèche de retour en haut à gauche -->
    <div class="absolute top-4 left-4 flex items-center">
        <a href="{{ route('conducteur.accueil') }}" class="flex items-center text-text-primary">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
    </div>
<div class="container mx-auto px-4 py-6">
    <!-- Titre -->
    <h2 class="text-2xl mt-2 font-bold text-center text-primary700 mb-6">Créer un nouveau trajet</h2>

    <!-- Formulaire de création -->
    <form action="{{ route('conducteur.trajets.store') }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        @csrf

        <!-- Lieu de départ -->
        <div class="mb-4">
            <label for="lieu_depart" class="block text-text-secondary text-sm font-bold mb-2">
                <i class="fas fa-map-marker-alt mr-2"></i>Lieu de départ
            </label>
            <input type="text" id="lieu_depart" name="lieu_depart" value="{{ old('lieu_depart') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-text-secondary leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Saisir le lieu de départ">
            @error('lieu_depart')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Lieu d'arrivée -->
        <div class="mb-4">
            <label for="lieu_arrive" class="block text-text-secondary text-sm font-bold mb-2">
                <i class="fas fa-map-pin mr-2"></i>Lieu d'arrivée
            </label>
            <input type="text" id="lieu_arrive" name="lieu_arrive" value="{{ old('lieu_arrive') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-text-secondary leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Saisir le lieu d'arrivée">
            @error('lieu_arrivee')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Date du trajet -->
        <div class="mb-4">
            <label for="date" class="block text-text-secondary text-sm font-bold mb-2">
                <i class="fas fa-calendar-alt mr-2"></i>Date du trajet
            </label>
            <input type="date" id="date" name="date" value="{{ old('date') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-text-secondary leading-tight focus:outline-none focus:shadow-outline">
            @error('date')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Heure du trajet -->
        <div class="mb-4">
            <label for="heure" class="block text-text-secondary text-sm font-bold mb-2">
                <i class="fas fa-clock mr-2"></i>Heure du trajet
            </label>
            <input type="time" id="heure" name="heure" value="{{ old('heure') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-text-secondary leading-tight focus:outline-none focus:shadow-outline">
            @error('heure')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nombre de places disponibles -->
        <div class="mb-4">
            <label for="nombre_places" class="block text-text-secondary text-sm font-bold mb-2">
                <i class="fas fa-car-side mr-2"></i>Nombre de places disponibles
            </label>
            <input type="number" id="nombre_places" name="nombre_places" min="1" value="{{ old('nombre_places') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-text-secondary leading-tight focus:outline-none focus:shadow-outline">
            @error('nombre_places')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Prix -->
        <div class="mb-6">
            <label for="prix" class="block text-text-secondary text-sm font-bold mb-2">
                <i class="fas fa-money-bill-wave mr-2"></i>Prix par place(en CFA)
            </label>
            <input type="number" step="0.01" id="prix" name="prix" value="{{ old('prix') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-text-secondary leading-tight focus:outline-none focus:shadow-outline">
            @error('prix')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <div class="flex items-center justify-center">
            <button type="submit"
                class="bg-primary700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                <i class="fas fa-save mr-2"></i>Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
