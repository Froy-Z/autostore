<?php

use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PagesController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home'])->name('home');
//Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog');
//Route::get('/product/{product}', [CatalogController::class, 'product'])->name('product');
Route::get('/about',    [PagesController::class, 'about'])->name('about');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');
Route::get('/sale',     [PagesController::class, 'sale'])->name('sale');
Route::get('/finance',  [PagesController::class, 'finance'])->name('finance');
Route::get('/clients',  [PagesController::class, 'clients'])->name('clients');
Route::get('/articles',  [PagesController::class, 'articles'])->name('articles');
Route::get('/articles/{slug}',  [ArticlesController::class, 'show'])->name('article.show');

Route::prefix('admin')->name('admin.')->group(function (Router $router) {
    $router->get('/', [AdminPagesController::class, 'admin'])->name('admin');
    $router->resource('articles', ArticlesController::class);
});
