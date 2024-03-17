<?php

namespace App\Providers;

use App\Repositories\FavoriteRepository;
use App\Repositories\GifRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\FavoriteService;
use App\Services\GifService;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GifService::class, function ($app) {
            return new GifService($app->make(GifRepository::class));
        });
        $this->app->bind(FavoriteService::class, function ($app) {
            return new FavoriteService($app->make(FavoriteRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict();
    }
}
