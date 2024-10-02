@extends('layouts.main')

@section('content')
<div class="absolute top-4 left-4 flex items-center">
    <a href="{{ Auth::user()->role === 'passager' ? route('passager.accueil') : route('conducteur.accueil') }}" class="flex items-center text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </a>
</div>
<div class="container mx-auto">
    <h1 class="text-2xl text-center font-bold mt-8">Messages</h1>

    @if($users->isEmpty())
        <p>Aucune conversation disponible.</p>
    @else
        <ul class="list-none mt-6">
            @foreach($users as $user)
                <li class="flex items-center mb-4 bg-gray-100 p-4 rounded hover:bg-gray-200 transition">
                    <a href="{{ route('messages.show', $user->id) }}" class="flex items-center w-full">
                        <!-- Photo de l'utilisateur -->
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full mr-4">

                        <!-- Nom de l'utilisateur -->
                        <span class="text-gray-800 font-semibold">{{ $user->name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
