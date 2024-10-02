@extends('layouts.main')

@section('content')
<div class="absolute top-4 left-4 flex items-center">
    <a href="{{ route('conducteur.accueil') }}" class="flex items-center text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </a>
</div>
<div class="container mx-auto px-4 py-6 mt-4">
    <h2 class="text-2xl font-bold mb-6 text-center">Profil du passager : {{ $passager->name }}</h2>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Informations du passager</h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <!-- Section de la photo de profil -->
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Photo de profil</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if($passager->profile_photo)
                            <img src="{{ asset('storage/' . $passager->profile_photo) }}" alt="Photo de profil" class="w-24 h-24 rounded-full object-cover">
                        @else
                            <img src="{{ asset('images/default-profile.png') }}" alt="Photo de profil par défaut" class="w-24 h-24 rounded-full object-cover">
                        @endif
                    </dd>
                </div>
                <!-- Autres informations -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nom</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $passager->name }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $passager->email }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $passager->phone }}</dd>
                </div>
                <!-- Bouton d'envoi de message -->
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <a href="{{ route('messages.show', $passager->id) }}" class="text-primary700">
                            <i class="fas fa-comment-dots"></i> Envoyer un message
                        </a>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection
