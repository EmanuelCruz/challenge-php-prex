<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Repositories\AuthRepository;
use App\Repositories\AuthRepositoryInterface;
use App\Services\AuthService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function register(): void
    {
        // $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthService($app->make(AuthRepository::class));
        });
    }

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Passport::personalAccessTokensExpireIn(now()->addMinute(30));
    }
}
