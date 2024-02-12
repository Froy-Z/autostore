<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home']);

Route::get('/catalog', [CatalogController::class, 'catalog']);

Route::get('/product/{product}', [CatalogController::class, 'product']);

