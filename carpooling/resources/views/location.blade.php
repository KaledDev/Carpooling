@extends('layouts.main')

@section('content')
<div class="relative w-full h-screen">
<!-- Carte en arrière-plan -->
<div id="map" class="absolute inset-0 w-full h-full z-0"></div>
    
    <!-- Modale -->
    <div class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50">
        <div class="bg-white p-10 rounded-lg shadow-lg max-w-sm w-full text-center mx-6">
            <img src="{{ asset('images/Location.svg') }}" alt="Location Icon" class="w-28 mx-auto mb-4 animate-spin">
            <h3 class="text-xl text-text-primary font-semibold mb-2">Activer votre localisation</h3>
            <p class="text-text-secondary mb-6">Choisissez votre emplacement pour commencer à trouver les demandes autour de vous.</p>
            <button id="useMyLocation" class="bg-primary700 text-white py-4 px-10 mb-4 rounded">Utiliser ma localisation</button>
            <a href="{{ route('appWelcome') }}">
                <p class="text-text-secondary">Passer pour l'instant</p>
            </a>
        </div>
    </div>
</div>
@endsection