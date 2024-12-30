<?php

namespace App\Providers;

use App\Interfaces\AuthInterface;
use App\Interfaces\TodoInterface;
use App\Repositories\AuthRepository;
use App\Repositories\TodoRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TodoInterface::class, TodoRepository::class);
        $this->app->bind(AuthInterface::class, AuthRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // JsonResource::withoutWrapping();
    }
}
