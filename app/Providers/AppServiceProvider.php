<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('layouts.menu', function ($view) {
            $view->with('advertisements', Advertisement::with(['media'])->orderBy('position')->get());
        });

        $formula = Cache::remember('formula', 3600, function () {
            return '$calories = ' . Setting::where('key', 'calories_formula')->first()->value . ';';
        });
        $calculations = extractFormula($formula);
        config([
            'settings.protein_multiplier' => $calculations['protein']['multiplier'] ?? 4,
            'settings.carbohydrate_multiplier' => $calculations['carbohydrate']['multiplier'] ?? 4,
            'settings.fat_multiplier' => $calculations['fat']['multiplier'] ?? 9
        ]);
    }
}
