<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{

    public function run(): void
    {
        foreach ($this->models() as $model) {
            Car::factory()->create(['name' => $model]);
        }
    }

    private function models()
    {
        return ['Seed', 'Cerato','K5','К900','Mohave', 'Stinger', 'Rio X',
            'Rio', 'Seltos', 'Sorento', 'Soul', 'Sportage', 'Xceed', 'Some Car'
        ];
    }
}
