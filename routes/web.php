<?php

use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PagesController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/',         [PagesController::class, 'home'])->name('home');
Route::get('/about',    [PagesController::class, 'about'])->name('about');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');
Route::get('/sale',     [PagesController::class, 'sale'])->name('sale');
Route::get('/finance',  [PagesController::class, 'finance'])->name('finance');
Route::get('/clients',  [PagesController::class, 'clients'])->name('clients');
Route::get('/salons',   [PagesController::class, 'salons'])->name('salons');

Route::prefix('admin')->name('admin.')->group(function (Router $router) {
    $router->get('/', [AdminPagesController::class, 'admin'])->name('admin');
    $router->get('articles/view', [ArticlesController::class, 'view'])->name('view');
    $router->resource('cars', CarsController::class)->except('show');
    $router->resource('articles', ArticlesController::class);
});


Route::prefix('/catalog')->group(function (Router $router) {
    $router->get('/{slug?}', [CatalogController::class, 'catalog'])->name('catalog');
    $router->get('/product/{id}', [CatalogController::class, 'product'])->name('product');
});


Route::prefix('/articles')->group(function (Router $router) {
    $router->get('/', [PagesController::class, 'articles'])->name('articles');
    $router->get('/{article:slug}', [ArticlesController::class, 'show'])->name('article.show');
});

