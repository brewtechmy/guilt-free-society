<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class ContactController extends Controller
{
    public function __invoke()
    {
        $outlets = Outlet::all();

        return view('contact-us', compact("outlets"));
    }
}
