<?php

namespace App\Providers;

use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\Contracts\Services\CreateArticleServiceContract;
use App\Contracts\Services\CreateCarServiceContract;
use App\Contracts\Services\DeleteArticleServiceContract;
use App\Contracts\Services\DeleteCarServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\SalonsClientServiceContract;
use App\Contracts\Services\SlugServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Contracts\Services\UpdateArticleServiceContract;
use App\Contracts\Services\UpdateCarServiceContract;
use App\Services\ArticlesService;
use App\Services\CarsService;
use App\Services\CatalogDataCollectorService;
use App\Services\FlashMessage;
use App\Services\ImagesService;
use App\Services\SalonsClientService;
use App\Services\SlugService;
use App\Services\TagsSynchronizerService;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use QSchool\FakerImageProvider\FakerImageProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create(Config::get('app.faker_locale', 'en_US'));
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });

        $this->app->singleton(CreateArticleServiceContract::class, ArticlesService::class);
        $this->app->singleton(UpdateArticleServiceContract::class, ArticlesService::class);
        $this->app->singleton(DeleteArticleServiceContract::class, ArticlesService::class);

        $this->app->singleton(CreateCarServiceContract::class, CarsService::class);
        $this->app->singleton(UpdateCarServiceContract::class, CarsService::class);
        $this->app->singleton(DeleteCarServiceContract::class, CarsService::class);

        $this->app->singleton(FlashMessageContract::class, FlashMessage::class);
        $this->app->singleton(SlugServiceContract::class, SlugService::class);
        $this->app->singleton(CatalogDataCollectorServiceContract::class, CatalogDataCollectorService::class);
        $this->app->singleton(TagsSynchronizerServiceContract::class, TagsSynchronizerService::class);
        $this->app->singleton(ImagesServiceContract::class, function () {
            return $this->app->make(ImagesService::class, ['disk' => 'public']);
        });

        $this->app->singleton(SalonsClientServiceContract::class, function () {
            return $this->app->make(SalonsClientService::class, ['baseUrl' => config('services.salonApi.url')]);
        });
    }

    public function boot(): void
    {
        //
    }
}
