<?php

namespace Database\Seeders;

use App\Contracts\Services\ImagesServiceContract;
use App\Models\Banner;
use App\Models\Image;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(ImagesServiceContract $imagesService): void
    {
        for ($i = 0; $i < 6; $i++) {
            $banner = Banner::factory()->create();
            $banner->image()->associate(Image::factory()->create())->save();
        }

        foreach($this->paths() as $path) {
            $image = $imagesService->createImage(public_path($path));
            $banner = Banner::factory()->create();
            $banner->image()->associate($image)->save();
        }
    }
    private function paths(): array
    {
        return [
            '/assets/pictures/test_banner_1.jpg',
            '/assets/pictures/test_banner_2.jpg',
            '/assets/pictures/test_banner_3.jpg',
        ];
    }
}
