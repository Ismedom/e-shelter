<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * 
     *
     * @var array
     */
    protected $policies = [
        \App\Models\Accommodation::class => \App\Policies\AccommodationPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define(function (User $user, string $permission, $model = null) {
            return $user->can($permission);
        });
    }
}
