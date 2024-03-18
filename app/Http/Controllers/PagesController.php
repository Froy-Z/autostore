<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\BannersRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\SalonsRepositoryContract;
use App\DTO\ApiSalonModel;
use App\Models\Car;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\Factory;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly ArticlesRepositoryContract $articlesRepository,
    ) {
    }

    public function home(BannersRepositoryContract $bannersRepository): Factory|View|Application
    {
        $articles = $this->articlesRepository->getPublishedArticles(true,'desc', 3, ['image', 'tags']);
        $cars = $this->carsRepository->getNewCars(4, ['image']);
        $banners = $bannersRepository->getRandomBanners(3, ['image']);
        return view('pages.homepage', ['cars' => $cars, 'articles' => $articles, 'banners' => $banners]);
    }

    public function salons(SalonsRepositoryContract $repositoryContract): Factory|View|Application
    {
        $salons = $repositoryContract->getSalons();
        return view('pages.salons', ['salons' => $salons]);
    }
    public function about(): Factory|View|Application
    {
        return view('pages.about');
    }
    public function contacts(): Factory|View|Application
    {
        return view('pages.contacts');
    }
    public function sale(): Factory|View|Application
    {
        return view('pages.sale');
    }
    public function finance(): Factory|View|Application
    {
        return view('pages.finance');
    }
    public function clients(): Factory|View|Application
    {
        $cars = $this->carsRepository->findAll();

        dump(
            $cars->avg('price'),
            $cars->whereNotNull('old_price')->avg('price'),
            $cars->max('price'),
            $cars->pluck(['salon'])->unique()->toArray(),
            $cars->sortBy(fn($car) => $car->engine->name)->pluck(['engine'])->pluck(['name'])->unique()->toArray(),
            $cars->sortBy(fn($car) => $car->carClass->name)->mapWithKeys(fn (Car $car) => [Str::slug($car->carClass->name) => $car->carClass->name])->toArray(),

            $cars->whereNotNull('old_price')->filter(function (Car $car) {
                $numbers = [5, 6];
                $arrays = [$car->name, $car->engine->name, $car->kpp];
                foreach ($numbers as $number) {
                    foreach ($arrays as $array) {
                        if (str_contains($array, $number)) {
                            return $array;
                        }
                    }
                }
            })->toArray(),

            $cars->whereNotNull('body')->groupBy(fn($car) => $car->body->name)->map(function ($models) {
                return $models->avg('price');
            })->sort()->toArray()
        );

        return view('pages.clients');
    }

    public function articles(Request $request): Factory|View|Application
    {
        $articles = $this->articlesRepository->paginateForArticles(
            true,
            'desc',
            ['*'],
            5,
            $request->get('page',1),
            ['image', 'tags'],
        );
        return view('pages.articles.articles', ['articles' => $articles]);
    }
}


