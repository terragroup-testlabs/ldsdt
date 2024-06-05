<?php

namespace App\Providers;

use App\Services\CityTemperatureService;
use App\Services\TemperatureApiService;
use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->singleton(TemperatureApiService::class, function (Application $app) {
            return new TemperatureApiService(config('weather.key'));
        });

        $this->app->singleton(CityTemperatureService::class, function (Application $app) {
            return new CityTemperatureService(config('weather.city'), app(TemperatureApiService::class));
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
