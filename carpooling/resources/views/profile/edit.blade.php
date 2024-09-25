@extends('layouts.main')

@section('content')
<div class="flex flex-col items-center justify-center p-6 space-y-8">

    <!-- Barre de retour -->
    <div class="absolute top-4 left-4 flex items-center">
        <a href="{{ route(auth()->user()->role === 'passager' ? 'passager.accueil' : 'conducteur.accueil') }}" class="flex items-center text-gray-600 hover:text-gray-800">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>

        </a>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <h1 class="text-3xl font-extrabold text-text-primary mb-8">Mon Profil</h1>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="w-full max-w-lg space-y-6">
        @csrf
        @method('patch')
        <!-- Photo de profil -->
        <div class="flex flex-col items-center space-y-4">
            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Photo de profil" class="w-60 h-60 rounded-full object-cover object-center">
            <label for="profile_photo" class="cursor-pointer">
                <i class="pi pi-user-edit text-3xl"></i>
                <span class="sr-only">Modifier la photo de profil</span>
            </label>
            <input type="file" name="profile_photo" id="profile_photo" class="hidden" accept="image/*">
        </div>
        
        
        <!-- Nom -->
        <div class="space-y-2">
            <label for="name" class="block text-text-primary font-medium">Nom & prénom(s):</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Nom" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" required>
        </div>

        <!-- Email (Readonly) -->
        <div class="space-y-2">
            <label for="email" class="block text-text-primary font-medium">Email :</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700">
        </div>

        <!-- Numéro de téléphone (Readonly) -->
        <div class="space-y-2">
            <label for="phone" class="block text-text-primary font-medium">Téléphone :</label>
            <div class="flex items-center border border-gray-300 rounded-lg">
                <div class="flex items-center px-3 py-2 bg-gray-100 border-r border-gray-300">
                    <img src="{{ asset('images/burkina-faso.png') }}" alt="Burkina Faso Flag" class="w-6 h-4">
                    <span class="mx-2 text-">+226</span>
                </div>
                <input type="tel" id="phone" value="{{ old('phone', $user->phone) }}" placeholder="Votre numéro mobile" class="block w-full px-4 py-3 border-0 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-primary700" pattern="\d{8}" readonly disabled>
            </div>
        </div>

        <!-- Genre (Readonly) -->
        <div class="space-y-2">
            <label for="gender" class="block text-text-primary font-medium">Genre :</label>
            <input type="text" id="gender" value="{{ $user->gender == 'homme' ? 'Homme' : 'Femme' }}" class="block w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" readonly disabled>
        </div>

        <!-- Rôle (Readonly) -->
        <div class="space-y-2">
            <label for="role" class="block text-gray-600 font-medium">Rôle :</label>
            <input type="text" id="role" value="{{ ucfirst($user->role) }}" class="block w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary700" readonly disabled>
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4 mt-4">
            <button type="submit" class="bg-primary700 text-white px-6 py-3 rounded-lg shadow-sm transition-transform transform hover:scale-105 hover:bg-primary800">Sauvegarder</button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-green-600 font-medium">Profil mis à jour avec succès.</p>
            @endif
        </div>
    </form>
    <!-- Logout Button placed separately for clearer distinction -->
    <div class="w-full max-w-lg mt-8">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 w-full text-white px-4 py-2 rounded-lg shadow-sm transition-transform transform hover:scale-105 hover:bg-red-700">
                Déconnexion
            </button>
        </form>
    </div>
</div>
@endsection
