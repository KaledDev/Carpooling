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


    <!-- Section principale pour le contenu de la page -->
    <div class="flex items-center justify-center min-h-screen">
        <form action="{{ route('trajets.search') }}" method="GET" class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
            <div class="mb-6">
                <label for="depart" class="block text-text-primary">Départ</label>
                <input type="text" name="lieu_depart" id="depart" class="w-full p-2 border rounded" placeholder="Entrez la ville de départ" required>
            </div>
    
            <div class="mb-6">
                <label for="destination" class="block text-text-primary">Destination</label>
                <input type="text" name="lieu_arrive" id="destination" class="w-full p-2 border rounded" placeholder="Entrez la ville de destination" required>
            </div>
    
            <div class="mb-6">
                <label for="date" class="block text-text-primary">Date</label>
                <input type="date" name="date" id="date" class="w-full p-2 border rounded">
            </div>
    
            <button type="submit" class="bg-primary700 text-white px-6 py-3 rounded w-full">Rechercher</button>
        </form>
    </div>
    
    


    <!-- Navigation en bas -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-lg rounded-t-xl">
        <div class="flex justify-around items-center h-16">
            <a href="" class="flex flex-col items-center">
                <i class="fas fa-search text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Rechercher</span>
            </a>
            <a href="{{ route('passager.trajets.index')}}" class="flex flex-col items-center">
                <i class="fas fa-route text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Trajets</span>
            </a>
            <a href="{{route('passager.reservations.index')}}" class="flex flex-col items-center">
                <i class="fas fa-calendar-day text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Mes Réservations</span>
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

@endsection
