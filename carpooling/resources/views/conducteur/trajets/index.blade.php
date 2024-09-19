@extends('layouts.main')

@section('content')
    <div class="absolute top-4 left-4 flex items-center">
        <a href="{{ route('conducteur.accueil') }}" class="flex items-center text-text-secondary hover:text-gray-800">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
    </div>
    <div class="container mx-auto px-4 py-8">

        <h1 class="text-2xl font-bold mb-6 text-center" style="color: #08B783;">Mes Trajets</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        @if($trajets->isEmpty())
            <div class="text-center text-text-secondary">Aucun trajet disponible.</div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($trajets as $trajet)
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-2" style="color: #08B783;">Trajet de {{ $trajet->lieu_depart }} à {{ $trajet->lieu_arrive }}</h2>
                        <p class="text-text-secondary"><i class="fas fa-calendar-alt"></i> Date: {{ $trajet->date }}</p>
                        <p class="text-text-secondary"><i class="fas fa-clock"></i> Heure: {{ $trajet->heure }}</p>
                        <p class="text-text-secondary"><i class="fas fa-users"></i> Nombre de places: {{ $trajet->nombre_places }}</p>
                        <p class="text-text-secondary"><i class="fas fa-money-bill-wave"></i> Prix: {{ $trajet->prix }} CFA</p>

                        <div class="mt-4 flex justify-center space-x-2">
                            <!-- Bouton Voir Détails -->
                            <a href="{{ route('conducteur.trajets.show', $trajet->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex items-center justify-center w-1/3">
                                <i class="fas fa-eye mr-2"></i> Voir
                            </a>
                        
                            <!-- Bouton Modifier -->
                            <a href="{{ route('conducteur.trajets.edit', $trajet->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 flex items-center justify-center w-1/3">
                                <i class="fas fa-edit mr-2"></i> Modifier
                            </a>
                        
                            <!-- Bouton Supprimer -->
                            <form action="{{ route('conducteur.trajets.destroy', $trajet->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce trajet ?');" class="w-auto max-w-xs">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 flex items-center justify-center w-full">
                                    <i class="fas fa-trash mr-2"></i> Supprimer
                                </button>
                            </form>
                        </div>
                        
                        
                    </div>
                @endforeach
            </div>
        @endif
        
    </div>
@endsection
