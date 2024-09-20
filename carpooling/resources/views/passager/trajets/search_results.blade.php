@extends('layouts.main')

@section('content')
    <!-- Flèche de retour en haut à gauche -->
    <div class="absolute top-4 left-4 flex items-center">
        <a href="{{ route('passager.accueil') }}" class="flex items-center text-gray-600 hover:text-gray-800">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
    </div>

    <div class="container mx-auto p-4">
        <h2 class="text-xl mb-4 text-center text-primary700">Résultats de la recherche</h2>

        @if ($trajets->isEmpty())
            <p>Aucun trajet trouvé correspondant à vos critères de recherche.</p>
        @else
            <ul>
                @foreach ($trajets as $trajet)
                    <li class="mb-4 p-4 border rounded">
                        <p><strong>Départ :</strong> {{ $trajet->lieu_depart }}</p>
                        <p><strong>Destination :</strong> {{ $trajet->lieu_arrive }}</p>
                        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($trajet->date)->format('d-m-Y H:i') }}</p>

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
                                    <input type="number" name="nombre_places" id="nombre_places" min="1" max="{{ $trajet->nombre_places }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <button type="submit" class="bg-primary700 text-white px-4 py-2 rounded-md">
                                    Réserver
                                </button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
