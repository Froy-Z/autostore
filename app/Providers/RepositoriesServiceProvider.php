<?php

namespace App\Providers;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Repositories\CarsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CarsRepositoryContract::class, CarsRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
