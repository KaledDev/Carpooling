@extends('layouts.main')

@section('content')
    <!-- Flèche de retour en haut à gauche -->
    <div class="absolute top-4 left-4 flex items-center">
        <a href="{{route('messages.index')}}" class="flex items-center text-gray-600 hover:text-gray-800">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
    </div>
<div class="container mx-auto flex flex-col h-screen">

    <!-- Conteneur des messages (scrollable) -->
    <div class="flex-grow overflow-y-auto mb-16 mt-12">
        @foreach($messages as $message)
            @if($message->sender->id === Auth::id())
                <!-- Messages envoyés par l'utilisateur (à gauche) -->
                <div class="flex justify-start mb-4">
                    <div class="bg-primary700 text-white p-3 ml-2 rounded-lg max-w-xs">
                        <strong>Vous:</strong> {{ $message->content }}
                    </div>
                </div>
            @else
                <!-- Messages reçus (à droite) -->
                <div class="flex justify-end mb-4">
                    <div class="flex items-center space-x-3">
                        <!-- Photo de l'utilisateur -->
                        <img src="{{ $message->sender->profile_photo ? asset('storage/' . $message->sender->profile_photo) : asset('images/default-profile.png') }}" 
                             alt="Photo de {{ $message->sender->name }}" 
                             class="w-10 h-10 rounded-full object-cover">
                        <div class="bg-gray-100 p-3 rounded-lg max-w-xs">
                            {{ $message->content }}
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Formulaire de message fixé en bas -->
    <form action="{{ route('messages.store') }}" method="POST" class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-300 p-4 flex items-center">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">

        <!-- Champ de saisie du message -->
        <textarea name="content" id="content" class="border border-gray-300 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-primary700" rows="1" placeholder="Écrivez un message..." required></textarea>

        <!-- Bouton d'envoi avec icône -->
        <button type="submit" class="ml-2 bg-primary700 text-white p-3 rounded-full flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary700">
            <i class="pi pi-send"></i>
        </button>
    </form>
</div>
@endsection
