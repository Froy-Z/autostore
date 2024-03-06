<?php

namespace App\Services;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\DTO\CatalogDataDTO;
use App\DTO\CatalogFilterDTO;

class CatalogDataCollectorService implements CatalogDataCollectorServiceContract
{

    public function __construct(
        private readonly CarsRepositoryContract $carsRepository
    ) {
    }

    public function collectCatalogData(
        CatalogFilterDTO $catalogFilterDTO,
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page'
    ): CatalogDataDTO {

        $cars = $this->carsRepository->paginateForCatalog(
            $catalogFilterDTO,
            ['id', 'name', 'price', 'old_price'],
            $perPage,
            $page,
            $pageName
        );

        return new CatalogDataDTO($catalogFilterDTO, $cars);
    }
}
