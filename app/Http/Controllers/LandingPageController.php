<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function __invoke()
    {
        $advertisements = Advertisement::with(['media'])->orderBy('position')->get();
        $soldCount = 3000;
        return view('landing-page', compact('advertisements', 'soldCount'));
    }
}
