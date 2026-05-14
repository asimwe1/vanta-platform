<?php

namespace App\Providers;

use App\Models\VipClient;
use App\Observers\VipClientObserver;
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
        VipClient::observe(VipClientObserver::class);
    }
}
