<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Foundation\Application;
use Illuminate\View\Factory;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): Factory|View|Application
    {
        $articles = Article::latest('published_at')->whereNotNull('published_at')->take(3)->get();
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

}


