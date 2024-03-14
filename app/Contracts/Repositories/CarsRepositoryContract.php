<?php

namespace App\Contracts\Repositories;

use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CarsRepositoryContract extends FlushCacheRepositoryContract
{
    public function getModel(): Car;
    public function findAll(): Collection;
    public function paginateForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array $fields = ["*"],
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
        array $relations = [],
    ): LengthAwarePaginator;
    public function getNewCars(int $limit, array $relations = []): Car|Collection;
    public function findById(int $id, array $relations = []): Car;
    public function create(array $fields): Car;
    public function update(Car $car, array $fields): Car;
    public function delete(int $id);
    public function syncCategories(Car $car, array $categories = []): Car;
}
