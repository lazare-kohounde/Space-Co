<?php

namespace App\Providers;

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

    protected $observers = [
        \App\Models\DetailReservation::class => \App\Observers\DetailReservationObserver::class,
    ];
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

    }
}
