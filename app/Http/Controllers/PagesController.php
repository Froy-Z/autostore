<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
use App\Repositories\CarsRepository;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Factory;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): Factory|View|Application
    {
        $articles = Article::latest('published_at')->whereNotNull('published_at')->take(3)->get();
        $cars = Car::where('is_new', 1)->take(4)->get();
        return view('pages.homepage', ['cars' => $cars, 'articles' => $articles]);
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
    public function clients(CarsRepository $repository): Factory|View|Application
    {
        /** @var Collection $cars */
        $cars = $repository->findAll();

        dump(
            $cars->avg('price'),
            $cars->whereNotNull('old_price')->avg('price'),
            $cars->max('price'),
            $cars->sortBy('engine')->pluck(['engine'])->unique()->toArray(),
            $cars->sortBy('carClass')->mapWithKeys(fn (Car $car) => [Str::slug($car->carClass->name) => $car->carClass->name])->toArray(),

            $cars->whereNotNull('old_price')->filter(function (Car $car) {
                $numbers = [5, 6];
                $arrays = [$car->name, $car->engine_name, $car->kpp];
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

    public function articles(): Factory|View|Application
    {
        $articles = Article::latest('published_at')->whereNotNull('published_at')->get();
        return view('pages.articles.articles', ['articles' => $articles]);
    }
}


