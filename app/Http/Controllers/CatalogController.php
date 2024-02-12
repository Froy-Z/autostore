<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\View\Factory;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function catalog(): Factory|View|Application
    {
        return view('pages.catalog');
    }

    public function product($product): Factory|View|Application
    {
        return view('pages.product');
    }
}
