<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class AdminPagesController extends Controller
{
    protected function admin(): Factory|View|Application
    {
        return view('pages.admin.admin');
    }
}
