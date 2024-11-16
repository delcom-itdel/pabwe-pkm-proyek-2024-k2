<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Platform;

class PlatformServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Kirim data platform ke semua view yang menggunakan layout "main"
        View::composer('layouts.main', function ($view) {
            $platforms = Platform::all(); // Ambil semua data platform dari database
            $view->with('platforms', $platforms);
        });
    }

    /**
     * Register services.
     */
    public function register()
    {
        //
    }
}
