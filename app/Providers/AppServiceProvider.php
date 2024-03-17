<?php

namespace App\Providers;

use App\Repositories\GifRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\GifRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GifRepositoryInterface::class, GifRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict();
    }
}
