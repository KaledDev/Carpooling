@extends('layouts.main')

@section('content')

    <!-- Section pour la carte -->
    <div id="map" style="height: calc(100vh - 4rem);"></div>

    <!-- Navigation en bas -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-lg rounded-t-xl">
        <div class="flex justify-around items-center h-16">
            <a href="{{ route('conducteur.trajets.create')}}" class="flex flex-col items-center">
                <i class="fas fa-plus-circle text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Créer un trajet</span>
            </a>
            <a href="{{ route('conducteur.trajets.index')}}" class="flex flex-col items-center">
                <i class="fas fa-route text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Mes trajets</span>
            </a>
            <a href="{{ route('conducteur.reservations.index') }}" class="flex flex-col items-center">
                <i class="fas fa-calendar-check text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Réservations</span>
            </a>
            <a href="{{route('messages.index')}}" class="flex flex-col items-center">
                <i class="fas fa-envelope text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Messages</span>
            </a>
            <a href="{{route('profile.edit')}}" class="flex flex-col items-center">
                <i class="fas fa-user text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Profil</span>
            </a>
        </div>
    </nav>

    <!-- Inclure les fichiers Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


@endsection
