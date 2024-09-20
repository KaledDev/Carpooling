@extends('layouts.main')

@section('content')
<div class="absolute top-4 left-4 flex items-center">
    <a href="{{ route('passager.accueil') }}" class="flex items-center text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </a>
</div>

    <!-- Section principale pour le contenu de la page -->
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 text-primary700 text-center">Mes Réservations</h1>

        @if($reservations->isEmpty())
            <p>Aucune réservation trouvée.</p>
        @else
            @foreach($reservations as $reservation)
                <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                    <p><strong>Lieu de départ :</strong> {{ $reservation->trajet->lieu_depart }}</p>
                    <p><strong>Lieu d'arrivée :</strong> {{ $reservation->trajet->lieu_arrive }}</p>
                    <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($reservation->trajet->date)->format('d-m-Y H:i') }}</p>

                    <!-- Badge de statut -->
                    <span class="inline-block px-3 py-1 rounded-full mt-2 text-sm font-semibold
                        @if($reservation->statut == 'accepté')
                            bg-green-500 text-white
                        @elseif($reservation->statut == 'refusé')
                            bg-red-500 text-white
                        @else
                            bg-yellow-500 text-white
                        @endif
                    ">
                        {{ ucfirst($reservation->statut) }}
                    </span>
                </div>
            @endforeach
        @endif
    </div>

@endsection
