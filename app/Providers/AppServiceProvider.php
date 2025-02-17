<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Car;
use App\Observers\CarObserver;
use App\Repositories\CarRepositoryInterface;
use App\Repositories\CarRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Car::observe(CarObserver::class);
    }
}
