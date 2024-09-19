@extends('layouts.main')

@section('content')
<div class="absolute top-4 left-4 flex items-center">
    <a href="{{ route('conducteur.accueil') }}" class="flex items-center text-text-secondary hover:text-gray-800">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </a>
</div>
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl text-center font-bold text-primary700 mb-6">Réservations</h2>

    @if($trajets->isEmpty())
        <p>Aucun trajet pour l'instant.</p>
    @else
        @foreach($trajets as $trajet)
            <div class="mb-6">
                <h3 class="text-lg font-bold">Trajet: {{ $trajet->lieu_depart }} → {{ $trajet->lieu_arrive }}</h3>
                <a href="{{ route('conducteur.reservations.show', $trajet->id) }}" class="inline-block mt-4 bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">
                    Voir réservations
                </a>
            </div>
        @endforeach
    @endif
</div>
@endsection
