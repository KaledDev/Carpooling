@extends('layouts.main')

@section('content')
    <!-- Flèche de retour en haut à gauche -->
    <div class="absolute top-4 left-4 flex items-center">
        <a href="{{ route('passager.trajets.index') }}" class="flex items-center text-gray-600 hover:text-gray-800">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
    </div>

    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl text-center font-bold text-primary700 mb-6">Détails du trajet</h2>

        <!-- Affichage des détails du trajet -->
        <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <strong class="text-text-secondary">Lieu de départ:</strong>
                <p class="text-gray-900">{{ $trajet->lieu_depart }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-text-secondary">Lieu d'arrivée:</strong>
                <p class="text-gray-900">{{ $trajet->lieu_arrive }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-text-secondary">Date:</strong>
                <p class="text-gray-900">{{ $trajet->date }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-text-secondary">Heure:</strong>
                <p class="text-gray-900">{{ $trajet->heure }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-text-secondary">Nombre de places:</strong>
                <p class="text-gray-900">{{ $trajet->nombre_places }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-text-secondary">Prix:</strong>
                <p class="text-gray-900">{{ number_format($trajet->prix, 0, ',', ' ') }} CFA</p>
            </div>
            <!-- Vérification si le nombre de places est 0 -->
            @if($trajet->nombre_places == 0)
            <div class="text-red-600 font-bold mb-4">
                Ce trajet est complet. Aucune place disponible.
            </div>
            @else
            <form action="{{ route('passager.trajets.reserver', $trajet->id) }}" method="POST" class="mt-6">
                @csrf
                <div class="mb-4">
                    <label for="nombre_places" class="block text-sm font-medium text-text-secondary">Nombre de places</label>
                    <input type="number" name="nombre_places" id="nombre_places" min="1" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <button type="submit" class="bg-primary700 text-white px-4 py-2 rounded-md ">
                    Réserver
                </button>
            </form>
            @endif
        </div>
    </div>
@endsection
