<?php

namespace App\Providers;

use App\Listeners\UpdateSessionCustomerId;
use Illuminate\Support\ServiceProvider;

class EventServiceProviderCustom extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $listen = [
        Login::class => [
            UpdateSessionCustomerId::class,
        ],
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
