<?php

namespace App\Providers;

use App\Models\Advertisement;
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
    }
}
