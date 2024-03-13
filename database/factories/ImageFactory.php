<?php

namespace Database\Factories;

use App\Contracts\Services\ImagesServiceContract;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    public function definition(): array
    {
        /** @var ImagesServiceContract $imagesService */
        $imagesService = app(ImagesServiceContract::class);

        return [
            'path' => $imagesService->saveFile($this->faker->image(category: 'car'))
        ];
    }
}
