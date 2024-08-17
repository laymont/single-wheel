<?php

namespace App\Providers;

use App\Repositories\Interfaces\RaffleRepositoryInterface;
use App\Repositories\RaffleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RaffleRepositoryInterface::class, RaffleRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
