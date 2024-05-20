<?php

namespace App\Http\Controllers;

use App\Models\JoinUsPage;

class JoinUsController extends Controller
{
    public function __invoke()
    {
        $joinUs = JoinUsPage::where('is_main', 0)->orderby('position')->get();

        return view('join-us', compact('joinUs'));
    }
}
