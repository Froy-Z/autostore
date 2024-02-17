<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
use Illuminate\Foundation\Application;
use Illuminate\View\Factory;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): Factory|View|Application
    {
        $articles = Article::latest('published_at')->whereNotNull('published_at')->take(3)->get();
        if (Car::where('is_new', 1)->exists()) {
            $cars = Car::where('is_new', 1)->take(4)->get();
            return view('pages.homepage', ['cars' => $cars, 'articles' => $articles]);
        }
        return view('pages.homepage', ['articles' => $articles]);
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
        return view('pages.clients');
    }

    public function articles(): Factory|View|Application
    {
        $articles = Article::latest('published_at')->whereNotNull('published_at')->get();
        return view('pages.articles.articles', ['articles' => $articles]);
    }
}


