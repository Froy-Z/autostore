<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarSpecifications extends Component
{
    public array $specifications = [
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
    ];
    public function __construct(
        public readonly string $template
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.car_specifications.' . $this->template);
    }
}
