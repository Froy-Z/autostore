<?php

namespace Database\Factories;

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
        $kppTypes = ['МКПП', 'АКПП', 'Вариатор', 'Робот'];
        $colors = ['Чёрный', 'Белый', 'Красный', 'Зелёный', 'Жёлтый', 'Синий', 'Серый', 'Коричневый'];
        $salonTypes = ['Натуральная кожа', 'Заменитель кожи', 'Экологическая кожа', 'Ткань'];
        $year = $this->faker->optional()->numberBetween(2010,2024);

        return [
            'body' => $this->faker->paragraph(),
            'price' => $price = round(rand(1_500_000, 10_000_000), -4), // цена БЕЗ скидки
            'old_price' => $this->faker->optional()->numberBetween((int) ($price * 1.1), (int) ($price * 1.2)), // цена СО скидкой
            'salon' => $this->faker->optional()->randomElement($salonTypes),
            'kpp' => $this->faker->optional()->randomElement($kppTypes),
            'year' => $year,
            'color' => $this->faker->optional()->randomElement($colors),
            'is_new' => $year > 2021
        ];
    }
}
