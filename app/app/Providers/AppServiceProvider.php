<?php

namespace App\Providers;

use App\Repositories\Concrete\ReservationsRepository;
use App\Repositories\Interfaces\ReservationsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ReservationsRepositoryInterface::class, function() {
            return ReservationsRepository::create();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
