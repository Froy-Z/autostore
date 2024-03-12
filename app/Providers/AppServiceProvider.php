<?php

namespace App\Providers;

use App\Contracts\Services\ArticlesServiceContract;
use App\Contracts\Services\CarsServiceContract;
use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\SlugServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Services\ArticlesService;
use App\Services\CarsService;
use App\Services\CatalogDataCollectorService;
use App\Services\FlashMessage;
use App\Services\ImagesService;
use App\Services\SlugService;
use App\Services\TagsSynchronizerService;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use QSchool\FakerImageProvider\FakerImageProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create(Config::get('app.faker_locale', 'en_US'));
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });

        $this->app->singleton(ArticlesServiceContract::class, ArticlesService::class);
        $this->app->singleton(CarsServiceContract::class, CarsService::class);
        $this->app->singleton(FlashMessageContract::class, FlashMessage::class);
        $this->app->singleton(SlugServiceContract::class, SlugService::class);
        $this->app->singleton(CatalogDataCollectorServiceContract::class, CatalogDataCollectorService::class);
        $this->app->singleton(TagsSynchronizerServiceContract::class, TagsSynchronizerService::class);
        $this->app->singleton(ImagesServiceContract::class, function () {
            return $this->app->make(ImagesService::class, ['disk' => 'public']);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
