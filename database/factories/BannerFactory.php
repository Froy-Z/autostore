<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'url' => $this->faker->url(),
        ];
    }
}
