<?php

namespace App\Providers;

use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Repositories\PasteRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PasteRepositoryInterface::class, PasteRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
