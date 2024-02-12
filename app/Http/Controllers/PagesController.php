<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\View\Factory;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): Factory|View|Application
    {
        return view('pages.homepage');
//        return view('layouts.app');
    }
}
