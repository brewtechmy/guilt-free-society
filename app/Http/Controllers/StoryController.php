<?php

namespace App\Http\Controllers;

use App\Models\Section;

class StoryController extends Controller
{
    public function __invoke()
    {
        $texts = Section::whereIn('key', ['our_vision_text', 'our_values_text', 'our_mission_text'])->get()->keyBy('key');
        return view('story', compact('texts'));
    }
}
