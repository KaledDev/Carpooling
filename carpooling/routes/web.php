<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\ConducteurController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PassagerController;

Route::get('/', function () {
    return view('onboarding.step1');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Création des routes pour le onboarding
Route::prefix('onboarding')->name('onboarding.')->group(function () {
    Route::get('/', [OnboardingController::class, 'step1'])->name('step1');
    Route::get('/step2', [OnboardingController::class, 'step2'])->name('step2');
    Route::get('/step3', [OnboardingController::class, 'step3'])->name('step3');
});

Route::get('enable_location', function() {
    return view('location');
})->name('location');

Route::get('appWelcome', function() {
    return view('WelcomeApp');
})->name('appWelcome');

Route::group(['middleware' => ['auth', 'isConducteur']], function () {
    Route::get('/conducteur', [ConducteurController::class, 'acceuil'])->name('conducteur.accueil');

        // Routes pour le CRUD des trajets du conducteur
        Route::get('/conducteur/trajets', [ConducteurController::class, 'index'])->name('conducteur.trajets.index'); // Liste des trajets
        Route::get('/conducteur/trajets/create', [ConducteurController::class, 'create'])->name('conducteur.trajets.create'); // Formulaire de création de trajet
        Route::post('/conducteur/trajets', [ConducteurController::class, 'store'])->name('conducteur.trajets.store'); // Enregistrement d'un nouveau trajet
        Route::get('/conducteur/trajets/{id}', [ConducteurController::class, 'show'])->name('conducteur.trajets.show'); // Affichage d'un trajet spécifique
        Route::get('/conducteur/trajets/{id}/edit', [ConducteurController::class, 'edit'])->name('conducteur.trajets.edit'); // Formulaire de modification de trajet
        Route::put('/conducteur/trajets/{id}', [ConducteurController::class, 'update'])->name('conducteur.trajets.update'); // Mise à jour d'un trajet
        Route::delete('/conducteur/trajets/{id}', [ConducteurController::class, 'destroy'])->name('conducteur.trajets.destroy'); // Suppression d'un trajet
        Route::put('/conducteur/reservations/{reservation}', [ConducteurController::class, 'updateReservation'])->name('conducteur.reservations.update'); // Mise à jour du statut d'une réservation
        Route::get('/conducteur/reservations', [ConducteurController::class, 'reservations'])->name('conducteur.reservations.index');
        Route::get('/conducteur/trajets/{trajet}/reservations', [ConducteurController::class, 'showReservations'])->name('conducteur.reservations.show');
        // Route to view the profile of a passager (read-only)
        Route::get('/conducteur/passagers/{id}/profile', [ConducteurController::class, 'showPassagerProfile'])->name('conducteur.passagers.profile');

});

Route::group(['middleware' => ['auth', 'isPassager']], function () {
    Route::get('/passager', [PassagerController::class, 'accueil'])->name('passager.accueil');
    Route::get('/passager/trajets', [PassagerController::class, 'index'])->name('passager.trajets.index'); // Liste des trajets
    Route::get('/passager/trajets/{id}', [PassagerController::class, 'detail'])->name('passager.trajets.details'); // Détails des trajets
    Route::post('/passager/trajets/{id}/reserver', [PassagerController::class, 'reserver'])->name('passager.trajets.reserver');
    Route::get('/passager/reservations', [PassagerController::class, 'reservations'])->name('passager.reservations.index');
    Route::get('/trajets/search', [PassagerController::class, 'search'])->name('trajets.search');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{user}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});



require __DIR__.'/auth.php';
