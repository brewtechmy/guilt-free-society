<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Journey;

class StoryController extends Controller
{
    public function __invoke()
    {
        $texts = Section::whereIn('key', ['our_vision_text', 'our_values_text', 'our_mission_text'])->get()->keyBy('key');
        $images = Section::whereIn('key', ['our_vision_image', 'our_values_image', 'our_mission_image'])->get()->pluck('photo','key');
        $journeys = Journey::get()->pluck('photo');
        return view('story', compact('texts', 'journeys', 'images'));
    }
}
