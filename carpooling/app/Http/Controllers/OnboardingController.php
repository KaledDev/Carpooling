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
        return view('onboarding.step3');
    }
}
