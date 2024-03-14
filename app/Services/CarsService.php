<?php

namespace App\Services;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CarsServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Models\Car;

class CarsService implements CarsServiceContract
{

    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly ImagesServiceContract $imagesService,
        private readonly TagsSynchronizerServiceContract $tagsSynchronizerService,
    ) {
    }

    public function create(array $fields, array $tags): Car
    {
        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
        }
        $car = $this->carsRepository->getModel()->create($fields);
        if(! empty($fields['categories'])) {
            $this->carsRepository->syncCategories($car, $fields['categories']);
        }
        $this->tagsSynchronizerService->sync($car, $tags);
        $this->carsRepository->flushCache();
        return $car;
    }

    public function update(int $id, array $fields, array $tags = []): Car
    {
        $car = $this->carsRepository->findById($id);
        $oldImageId = null;

        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
            $oldImageId = $car->image_id;
        }
        $this->carsRepository->update($car, $fields);
        if ($fields['categories'] !== null) {
            $this->carsRepository->syncCategories($car, $fields['categories']);
        }
        if (! empty($oldImageId)) {
            $this->imagesService->deleteImage($oldImageId);
        }
        $this->carsRepository->flushCache('');
        return $car;
    }

    public function delete(int $id)
    {
        $this->carsRepository->delete($id);
        $this->carsRepository->flushCache();
    }
}
