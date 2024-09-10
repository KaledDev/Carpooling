<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    public function step1()
    {
        return view('onboarding.step1');
    }

    public function step2()
    {
        return view('onboarding.step2');
    }

    public function step3()
    {
        // Quand l'utilisateur arrive à l'écran 3, l'onboarding est terminé
        session(['onboarding_completed' => true]);
        return redirect('/home');
    }
}
