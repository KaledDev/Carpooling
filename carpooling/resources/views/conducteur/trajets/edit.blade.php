@extends('layouts.main')

@section('content')
    <div class="absolute top-4 left-4 flex items-center">
        <a href="{{ route('conducteur.trajets.index') }}" class="flex items-center text-gray-600 hover:text-gray-800">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
    </div>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-center" style="color: #08B783;">Modifier le Trajet</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
                <strong>Oups ! Il y a eu des erreurs.</strong>
                <ul class="list-disc pl-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('conducteur.trajets.update', $trajet->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4">
                    <label for="lieu_depart" class="block text-gray-700 text-sm font-bold mb-2">Lieu de départ</label>
                    <input type="text" id="lieu_depart" name="lieu_depart" value="{{ old('lieu_depart', $trajet->lieu_depart) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="lieu_arrive" class="block text-gray-700 text-sm font-bold mb-2">Lieu d'arrivée</label>
                    <input type="text" id="lieu_arrive" name="lieu_arrive" value="{{ old('lieu_arrive', $trajet->lieu_arrive) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                    <input type="date" id="date" name="date" value="{{ old('date', $trajet->date) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="heure" class="block text-gray-700 text-sm font-bold mb-2">Heure</label>
                    <input type="time" id="heure" name="heure" value="{{ old('heure', $trajet->heure) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="nombre_places" class="block text-gray-700 text-sm font-bold mb-2">Nombre de places</label>
                    <input type="number" id="nombre_places" name="nombre_places" value="{{ old('nombre_places', $trajet->nombre_places) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix</label>
                    <input type="number" id="prix" name="prix" value="{{ old('prix', $trajet->prix) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mt-6 flex justify-center">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded flex items-center">
                        <i class="fas fa-save mr-2"></i> Enregistrer les modifications
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
