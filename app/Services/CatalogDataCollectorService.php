<?php

namespace App\Services;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\DTO\CatalogDataDTO;
use App\DTO\CatalogFilterDTO;

class CatalogDataCollectorService implements CatalogDataCollectorServiceContract
{

    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly CategoriesRepositoryContract $categoriesRepository,
    ) {
    }

    public function collectCatalogData(
        CatalogFilterDTO $catalogFilterDTO,
        ?string $slug,
        int $perPage = 16,
        int $page = 1,
        string $pageName = 'page'
    ): CatalogDataDTO {
        $category = null;
        if ($slug) {
            $category = $this->categoriesRepository->findBySlug($slug, ['descendants']);
            $catalogFilterDTO->forCategory($category);
        }

        $cars = $this->carsRepository->paginateForCatalog(
            $catalogFilterDTO,
            ['id', 'name', 'price', 'old_price', 'image_id'],
            $perPage,
            $page,
            $pageName,
            ['image'],
        );

        return new CatalogDataDTO($catalogFilterDTO, $cars, $category);
    }
}
