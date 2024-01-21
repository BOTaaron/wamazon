<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate for product modification
        Gate::define('modify-products', function ($user) {
            return $user->role_id == 1 || $user->role_id == 2; // Allow for Administrator and Seller
        });

        // Gate for user modification
        Gate::define('modify-users', function ($user) {
            return $user->role_id == 1; // Allow only for Administrator
        });
    }
}
