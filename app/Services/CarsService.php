<?php

namespace App\Services;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CreateCarServiceContract;
use App\Contracts\Services\DeleteCarServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Contracts\Services\UpdateCarServiceContract;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CarsService implements CreateCarServiceContract, UpdateCarServiceContract, DeleteCarServiceContract
{

    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly ImagesServiceContract $imagesService,
        private readonly TagsSynchronizerServiceContract $tagsService,
    ) {
    }

    public function create(array $fields, array $tags = [], array $categories = []): Car
    {
        return DB::transaction(function () use ($fields, $tags, $categories) {
            if (! empty($fields['image'])) {
                $image = $this->imagesService->createImage($fields['image']);
                $fields['image_id'] = $image->id;
            }
            $car = $this->carsRepository->getModel()->create($fields);
            if(! empty($categories)) {
                $this->carsRepository->syncCategories($car, $fields['categories']);
            }
            $this->tagsService->sync($car, $tags);
            $this->carsRepository->flushCache();
            return $car;
        });
    }

    public function update(int $id, array $fields, array $tags = [], array $categories = []): Car
    {
        return DB::transaction(function () use ($id, $fields, $tags, $categories) {
            $car = $this->carsRepository->findById($id);
            $oldImageId = null;

            if (! empty($fields['image'])) {
                $image = $this->imagesService->createImage($fields['image']);
                $fields['image_id'] = $image->id;
                $oldImageId = $car->image_id;
            }
            $car = $this->carsRepository->update($car, $fields);
            $this->tagsService->sync($car, $tags);
            if (! empty($categories)) {
                $this->carsRepository->syncCategories($car, $fields['categories']);
            }
            if (! empty($oldImageId)) {
                $this->imagesService->deleteImage($oldImageId);
            }
            $this->carsRepository->flushCache('');
            return $car;
        });
    }

    public function delete(int $id): void
    {
        DB::transaction(function () use ($id) {
            $this->carsRepository->delete($id);
            $this->carsRepository->flushCache();
        });
    }
}
