<?php

namespace App\Http\Controllers;

use App\Models\JoinUsPage;
use App\Models\Section;
class JoinUsController extends Controller
{
    public function __invoke()
    {
        $joinUs = JoinUsPage::all();
        // $link = Section::where('key', 'help_us_improve_link')->first()->value;
        return view('join-us', compact("joinUs"));
    }
}
