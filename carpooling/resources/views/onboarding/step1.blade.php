@extends('layouts.app')

@section('title', 'Onboarding étape 1')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-between relative px-4 py-6">
    <a href="{{ route('onboarding.step2') }}" class="absolute top-4 right-4 text-blue-500 hover:underline text-sm">Skip</a>
    
    <div class="flex flex-col items-center justify-center flex-grow text-center mt-4">
    <img src="{{ asset('images/step1.svg') }}" alt="Step 1" class="w-4/5 h-auto mb-6 max-w-md">
        <h1 class="text-xl font-bold mb-2">Covoiturage Simplifié</h1>
        <p class="text-base text-gray-700 mb-6">
            Réservez vos trajets facilement et trouvez des conducteurs ou passagers près de chez vous.
        </p>
    </div>
    
    <div class="mb-4">
        <img src="{{ asset('images/progress1.svg') }}" alt="Progression" class="w-2/3 h-auto max-w-lg ml-8">
    </div>
</div>
@endsection
