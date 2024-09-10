<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnboardingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/onboarding', [OnboardingController::class, 'step1'])->name('onboarding.step1');
Route::get('/onboarding/step2', [OnboardingController::class, 'step2'])->name('onboarding.step2');
Route::get('/onboarding/step3', [OnboardingController::class, 'step3'])->name('onboarding.step3');

require __DIR__.'/auth.php';
