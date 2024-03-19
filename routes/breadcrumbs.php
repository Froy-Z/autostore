<?php

use App\Models\Article;
use App\Models\Car;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Главная
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

// Главная > О компании
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('О компании', route('about'));
});

// Главная > Контактная информация
Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Для клиентов', route('contacts'));
});

// Главная > Условия продаж
Breadcrumbs::for('sale', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Условия продаж', route('sale'));
});

// Главная > Финансовый отдел
Breadcrumbs::for('finance', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Финансовый отдел', route('finance'));
});

// Главная > Для клиентов
Breadcrumbs::for('clients', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Для клиентов', route('clients'));
});

// Главная > Салоны
Breadcrumbs::for('salons', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Салоны', route('salons'));
});

// Главная > Каталог
Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog'));
});

// Home > Каталог > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $categories) {
    $trail->parent('catalog');
    foreach ($categories as $category) {
        $trail->push($category->name, route('catalog', $category));
    }
});

// Главная > Каталог > [Category] > [Car]
Breadcrumbs::for('product', function (BreadcrumbTrail $trail, Car $car) {
    $trail->parent('category', $car->categories);
    $trail->push($car->name, route('product', $car));
});

// Главная > Новости
Breadcrumbs::for('articles', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Новости', route('articles'));
});

// Главная > Новости > [Article]
Breadcrumbs::for('article.show', function (BreadcrumbTrail $trail, Article $article) {
    $trail->parent('articles');
    $trail->push($article->title, route('article.show', $article));
});
