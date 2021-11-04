<?php

namespace App\Providers;

use App\Services\AphavantageServiceApi;
use Illuminate\Support\Facades\URL;
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
        $this->app->singleton(AphavantageServiceApi::class, function ($app) {
            return new AphavantageServiceApi(
                config('services.alphavantage.uri'),
                config('services.alphavantage.key')
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        URL::forceScheme('https');
    }

}
