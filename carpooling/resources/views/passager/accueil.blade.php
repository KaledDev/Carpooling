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
    <div class="container mx-auto p-4">
        <!-- Contenu spécifique aux passagers ici -->
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
            <a href="" class="flex flex-col items-center">
                <i class="fas fa-calendar-day text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Mes Réservations</span>
            </a>
            <a href="" class="flex flex-col items-center">
                <i class="fas fa-envelope text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Messages</span>
            </a>
            <a href="" class="flex flex-col items-center">
                <i class="fas fa-user text-text-secondary"></i>
                <span class="text-xs mt-1 text-text-secondary">Profil</span>
            </a>
        </div>
    </nav>

@endsection
