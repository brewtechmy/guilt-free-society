<?php

namespace App\Http\Controllers;

use App\Models\JoinUsPage;
use App\Models\Section;
class JoinUsController extends Controller
{
    public function __invoke()
    {
        $joinUs = JoinUsPage::where('is_main',0)->orderby('position')->get();

        $mainPhoto = JoinUsPage::where('is_main',1)->first();

        return view('join-us', compact("joinUs","mainPhoto"));
    }
}
