<?php

namespace App\Providers;

use App\Contracts\Repositories\TagsRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\SlugServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Services\CatalogDataCollectorService;
use App\Services\FlashMessage;
use App\Services\SlugService;
use App\Services\TagsSynchronizerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FlashMessageContract::class, FlashMessage::class);
        $this->app->singleton(SlugServiceContract::class, SlugService::class);
        $this->app->singleton(CatalogDataCollectorServiceContract::class, CatalogDataCollectorService::class);
        $this->app->singleton(TagsSynchronizerServiceContract::class, TagsSynchronizerService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
