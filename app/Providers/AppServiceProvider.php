<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Advertisement;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
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
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
            
        view()->composer('layouts.menu', function ($view) {
            $view->with('advertisements', Advertisement::with(['media'])->orderBy('position')->get());
        });

        $formula = Cache::remember('formula', 3600, function () {
            if (Schema::hasTable('settings')) {
                $setting = Setting::where('key', 'calories_formula')->first();

                return !empty($setting)
                    ? '$calories = ' . $setting->value . ';'
                    : '$calories = (4 * $protein) + (4 * $carbohydrate) + (9 * $fat);';
            } else {
                return '$calories = (4 * $protein) + (4 * $carbohydrate) + (9 * $fat);';
            }
        });

        if ($formula != null) {
            $calculations = extractFormula($formula);
            config([
                'settings.protein_multiplier' => $calculations['protein']['multiplier'] ?? 4,
                'settings.carbohydrate_multiplier' => $calculations['carbohydrate']['multiplier'] ?? 4,
                'settings.fat_multiplier' => $calculations['fat']['multiplier'] ?? 9
            ]);
        }
    }
}
