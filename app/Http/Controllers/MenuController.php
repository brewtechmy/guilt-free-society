<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\IngredientCategory;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ingredientCategories = IngredientCategory::with(['ingredients'])->get();

        return view('byob', compact('ingredientCategories'));
    }

    public function menu()
    {
        return view('menu');
    }
}
