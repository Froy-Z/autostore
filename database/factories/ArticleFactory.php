<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'image_id' => Image::factory(),
            'published_at' => $this->faker->optional()->dateTimeThisMonth
        ];
    }
}
