<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Section;

class ContactController extends Controller
{
    public function __invoke()
    {
        $outlets = Outlet::all();
        $link = Section::where('key', 'help_us_improve_link')->first()->value;
        return view('contact-us', compact("outlets", "link"));
    }
}
