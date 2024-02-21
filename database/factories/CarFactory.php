<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $year = $this->faker->optional()->numberBetween(2010,2024);

        return [
            'description' => $this->faker->paragraph(),
            'price' => $price = round(rand(1_500_000, 10_000_000), -4), // цена БЕЗ скидки
            'old_price' => $this->faker->optional()->numberBetween((int) ($price * 1.1), (int) ($price * 1.2)), // цена СО скидкой
            'salon' => $this->faker->optional()->randomElement($this->salons()),
            'kpp' => $this->faker->optional()->randomElement($this->transmissions()),
            'year' => $year,
            'color' => $this->faker->optional()->randomElement($this->colors()),
            'is_new' => $year > 2021,

            'car_class_id' => CarClass::factory(),
            'car_body_id' => CarBody::factory(),
            'car_engine_id' => CarEngine::factory(),
        ];
    }

    private function salons(): array
    {
        return ['Натуральная кожа', 'Заменитель кожи', 'Экологическая кожа', 'Ткань'];
    }

    private function colors(): array
    {
        return ['Чёрный', 'Белый', 'Красный', 'Зелёный', 'Жёлтый', 'Синий', 'Серый', 'Коричневый'];
    }

    private function transmissions(): array
    {
        return ['МКПП', 'АКПП', 'Вариатор', 'Робот'];
    }
}
