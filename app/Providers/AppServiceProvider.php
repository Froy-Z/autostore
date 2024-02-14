<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['components.panels.left_information_menu', 'components.panels.footer_information_menu'], function (\Illuminate\View\View $view) {
            $view->with('menu', [
                [
                    'title' => 'О компании',
                    'route' => 'about',
                ],
                [
                    'title' => 'Контактная информация',
                    'route' => 'contacts',
                ],
                [
                    'title' => 'Условия продаж',
                    'route' => 'sale',
                ],
                [
                    'title' => 'Финансовый отдел',
                    'route' => 'finance',
                ],
                [
                    'title' => 'Для клиентов',
                    'route' => 'clients',
                ],
            ]);
        });
    }
}
