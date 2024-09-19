@extends('layouts.main')

@section('content')
@if (session('error'))
    <div id="error-message" class="bg-red-500 text-white p-4 my-6 mx-6 rounded-md relative">
        <span>{{ session('error') }}</span>
        <button class="close-btn absolute top-0 right-0 mt-2 mr-4 text-2xl font-bold">
            &times;
        </button>
    </div>
@endif

@if (session('success'))
    <div id="success-message" class="bg-green-500 text-white p-4 my-6 mx-6 rounded-md relative">
        <span>{{ session('success') }}</span>
        <button class="close-btn absolute top-0 right-0 mt-2 mr-4 text-2xl font-bold">
            &times;
        </button>
    </div>
@endif
    <!-- Flèche de retour en haut à gauche -->
    <div class="absolute top-4 left-4 flex items-center">
        <a href="{{ route('passager.accueil') }}" class="flex items-center text-gray-600 hover:text-gray-800">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
    </div>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl mt-8 text-center font-bold mb-6">Liste des trajets disponibles</h1>

        @if($trajets->isEmpty())
            <p class="text-text-primary">Aucun trajet disponible pour le moment.</p>
        @else
            <div class="bg-white shadow-md rounded-lg">
                <ul class="divide-y divide-gray-200">
                    @foreach($trajets as $trajet)
                        <li class="p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <h2 class="text-xl font-semibold">{{ $trajet->lieu_depart }} &rarr; {{ $trajet->lieu_arrive }}</h2>
                                    <p class="text-text-secondary">{{ $trajet->date }} à {{ $trajet->heure }}</p>
                                    <p class="text-text-secondary">Places disponibles : {{ $trajet->nombre_places }}</p>
                                    <p class="text-text-secondary">Prix : {{ number_format($trajet->prix, 2) }} CFA</p>
                                </div>
                                <a href="{{ route('passager.trajets.details', $trajet->id) }}" class="text-primary700 font-bold hover:underline">
                                    Voir les détails
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
