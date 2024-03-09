<?php

namespace App\Contracts\Repositories;

use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CarsRepositoryContract
{
    public function getModel(): Car;
    public function findAll(): Collection;
    public function paginateForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array $fields = ["*"],
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
    ): LengthAwarePaginator;
    public function getNewCars(int $limit): Car|Collection;
    public function findById(int $id): Car;
    public function create(array $fields): Car;
    public function update(int $id, array $fields): Car;
    public function delete(int $id);
}
