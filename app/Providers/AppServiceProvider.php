<?php

namespace App\Providers;

use App\Services\Implementations\CurrencyCountryService;
use App\Services\Interfaces\ICurrencyCountryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICurrencyCountryService::class, CurrencyCountryService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
