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
        View::composer(['components.panels.left_information_menu', 'components.panels.footer.footer_information_menu'], function (\Illuminate\View\View $view) {
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

//        View::composer(['components.panels.cars.car_specification'], function (\Illuminate\View\View $view) {
//            $view->with('specifications', [
//                [
//                    'salon' => 'Салон:',
//                    'class' => 'Класс:',
//                    'kpp' => 'КПП:',
//                    'year' => 'Год выпуска:',
//                    'color' => 'Цвет:',
//                    'carcase' => 'Кузов:',
//                    'engine' => 'Двигатель:',
//                ],
//            ]);
//        });

        View::composer(['components.panels.cars.car_specification'], function (\Illuminate\View\View $view) {
            $view->with('specifications', [
                [
                    'title' => 'Салон:',
                    'character' => 'salon'
                ],
                [
                    'title' => 'Класс:',
                    'character' => 'class'
                ],
                [
                    'title' => 'КПП:',
                    'character' => 'kpp'
                ],
                [
                    'title' => 'Год выпуска:',
                    'character' => 'year'
                ],
                [
                    'title' => 'Цвет:',
                    'character' => 'color'
                ],
                [
                    'title' => 'Кузов:',
                    'character' => 'carcase'
                ],
                [
                    'title' => 'Двигатель:',
                    'character' => 'engine'
                ]
            ]);
        });
    }
}
