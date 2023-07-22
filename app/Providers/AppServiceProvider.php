<?php

namespace App\Providers;

use App\Contracts\RapidApiServiceProvider;
use App\Services\RapidApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RapidApiServiceProvider::class, RapidApiService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
