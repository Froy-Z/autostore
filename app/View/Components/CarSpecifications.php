<?php

namespace App\View\Components;

use App\Models\Car;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarSpecifications extends Component
{
    public array $specifications;

    public function __construct(
        public readonly Car $car
    )
    {
        $this->specifications = [
            [
                'title' => 'Салон:',
                'value' => $this->car->salon,
            ],
            [
                'title' => 'КПП:',
                'value' => $this->car->kpp,
            ],
            [
                'title' => 'Год выпуска:',
                'value' => $this->car->year,
            ],
            [
                'title' => 'Цвет:',
                'value' => $this->car->color,
            ],
            [
                'title' => 'Двигатель:',
                'value' => $this->car->engine->name,
            ],
            [
                'title' => 'Класс:',
                'value' => $this->car->carClass->name,
            ],
            [
                'title' => 'Кузов:',
                'value' => $this->car->body->name,
            ],
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.car_specifications.specification', [
            'specifications' => $this->specifications
        ]);
    }
}
