<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Section;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function __invoke()
    {
        $advertisements = Advertisement::with(['media'])->orderBy('position')->get();
        $soldCount = Section::where('key', 'number_bowl_sold')->first()->value;
        return view('landing-page', compact('advertisements', 'soldCount'));
    }
}
