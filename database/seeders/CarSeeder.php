<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{

    public function run(): void
    {
        /** @var Collection $carClasses */
        $carClasses = CarClass::get();
        /** @var Collection $carEngines */
        $carEngines = CarEngine::get();
        /** @var Collection $carBodies */
        $carBodies = CarBody::get();
        /** @var Collection $categories */
        $categories = Category::get();
        for ($i = 0; $i < 4; $i++) {
            foreach ($this->models() as $model) {
                /** @var Car $carModel */
                $carModel = Car::factory()->create(array_merge(
                    ['name' => $model,
                        'car_class_id' => $carClasses->random(),
                        'car_engine_id' => $carEngines->random(),
                        'car_body_id' => $carBodies->random(),
                    ]));
                $carModel->categories()->attach($categories->random(rand(1, 3)));
                $carModel->images()->attach(Image::factory()->count(rand(0, 3))->create());
            }
        }

    }

    private function models()
    {
        return [
            'Seed',
            'Cerato',
            'K5',
            'К900',
            'Mohave',
            'Stinger',
            'Rio X',
            'Rio',
            'Seltos',
            'Sorento',
            'Soul',
            'Sportage',
            'Xceed',
            'Some Car'
        ];
    }
}
