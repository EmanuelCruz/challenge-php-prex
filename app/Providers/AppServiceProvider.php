<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\GifRepositoryInterface;
use App\Repositories\GiphyRepository;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GifRepositoryInterface::class, GiphyRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict();
    }
}
