<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
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
    public function clients(): Factory|View|Application
    {
        /** @var Collection $cars */
        $cars = Car::select('cars.*', 'car_classes.name as class_name',
                                      'car_bodies.name as body_name',
                                      'car_engines.name as engine_name')
            ->leftJoin('car_classes', 'cars.car_class_id',  '=', 'car_classes.id')
            ->leftJoin('car_bodies',  'cars.car_body_id',   '=', 'car_bodies.id')
            ->leftJoin('car_engines', 'cars.car_engine_id', '=', 'car_engines.id')
            ->get();

        dump(
            $cars->avg('price'),
            $cars->whereNotNull('old_price')->avg('price'),
            $cars->max('price'),
            $cars->pluck(['salon'])->unique()->toArray(),
            $cars->sortBy('engine_name')->pluck(['engine_name'])->unique()->toArray(),
            $cars->sortBy('class_name')->mapWithKeys(fn (Car $car) => [Str::slug($car->class_name) => $car->class_name])->toArray(),

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

            $cars->whereNotNull('body_name')->groupBy('body_name')->map(function ($models) {
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


