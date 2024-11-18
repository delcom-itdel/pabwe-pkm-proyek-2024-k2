<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Prestasi;
use App\Models\Gallery;
use App\Models\Staff;

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
        // Share the $prestasi variable with all views
        view()->composer('*', function ($view) {
            $prestasi = Prestasi::all();
            $view->with('prestasi', $prestasi);
        });

        // Share the $prestasi variable with all views
        view()->composer('*', function ($view) {
            // Fetch all galleries from the database
            $galleries = Gallery::all();
            // Share the galleries variable with all views
            $view->with('galleries', $galleries);
        });
        
        view()->composer('*', function ($view) {
            $staff = Staff::all(); // Get all staff from the database
            $view->with('staff', $staff); // Share the staff data with all views
        });

    }
}
