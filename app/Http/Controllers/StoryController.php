<?php

namespace App\Http\Controllers;

class StoryController extends Controller
{
    public function __invoke()
    {
        return view('story');
    }
}
