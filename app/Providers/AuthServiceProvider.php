<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;

use App\Models\Customer;
use App\Models\Publication;
use Illuminate\Auth\GenericUser;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        //  if (Auth::guard('customer')->user()->id != $publication->customer_id)
        //     abort(403);
        // Gate::define('optimise-publication', function (GenericUser $customer, Publication $publication) {
        // pour la 1ere methode
        Gate::define('forbidden-publication', function (Customer $customer, Publication $publication) {
            return $customer->id !== $publication->customer_id;
        });
        // pour la 2eme methode
        Gate::define('authorize-publication', function (Customer $customer, Publication $publication) {
            return $customer->id === $publication->customer_id;
        });
        Gate::define('administrator-access', function (Customer $customer) {
            return $customer->is_admin;
        });

    }
}
