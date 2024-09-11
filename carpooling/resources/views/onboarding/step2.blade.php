@extends('layouts.app')

@section('title', 'Onboarding étape 2')

@section('content')
<div class="p-4">
    <div class="min-h-screen flex flex-col items-center justify-between relative px-4 py-6">
        <a href="{{ route('onboarding.step1') }}" class="absolute top-4 left-4 text-text-primary hover:underline text-sm">Retour</a>
        <a href="{{ route('onboarding.step3') }}" class="absolute top-4 right-4 text-text-primary hover:underline text-sm">Passer</a>

        <div class="flex flex-col items-center justify-center flex-grow text-center mt-4 w-full max-w-full">
            <img src="{{ asset('images/step2.svg') }}" alt="Step 2" class="w-full h-auto mb-6 max-w-screen-lg">
            <h1 class="text-2xl font-bold mb-2 text-text-primary">Votre Profil</h1>
        <p class="text-base text-text-secondary mb-6">
                Complétez votre profil pour que nous puissions vous offrir des
                trajets et des conducteurs adaptés à vos besoins.
            </p>
        </div>

        <a href="{{ route('onboarding.step3') }}" class="mb-4">
            <img src="{{ asset('images/progress2.svg') }}" alt="Progression" class="w-2/3 h-auto max-w-lg ml-8 cursor-pointer pulse-effect">
        </a>
    </div>
</div>
@endsection
