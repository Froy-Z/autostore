<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CarsRepository implements CarsRepositoryContract
{
    public function __construct(
        private readonly Car $model
    ) {
    }

    public function getModel(): Car
    {
        return $this->model;
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function getNewCars(int $limit): Car|Collection
    {
        $query = $this->getModel()->newQuery()->where('is_new', '=', true)->take($limit);
        return $query->get();
    }

    public function findById(int $id): Car
    {
        return $this->getModel()->findOrFail($id);
    }


    public function create(array $fields): Car
    {
        return $this->getModel()->create($fields);
    }

    public function update(int $id, array $fields): Car
    {
        $car = $this->findById($id);
        $car->update($fields);
        return $car;
    }

    public function delete(int $id)
    {
        $this->getModel()->where('id', $id)->delete();
    }

    public function findForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array $fields = ["*"]
    ): Collection {
        return $this->catalogQuery($catalogFilterDTO)->get($fields);
    }

    public function paginateForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array $fields = ["*"],
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
    ): LengthAwarePaginator {
        return $this->catalogQuery($catalogFilterDTO)->paginate($perPage, $fields, $pageName, $page);
    }

    private function catalogQuery(CatalogFilterDTO $catalogFilterDTO): Builder
    {
        return $this->getModel()->newQuery()
            ->when($catalogFilterDTO->getModel() !== null, fn($query) => $query->where('name', 'like', '%' . $catalogFilterDTO->getModel() . '%'))
            ->when($catalogFilterDTO->getMinPrice() !== 0, fn($query) => $query->where('price', '>=', $catalogFilterDTO->getMinPrice()))
            ->when($catalogFilterDTO->getMaxPrice() !== 0, fn($query) => $query->where('price', '<=', $catalogFilterDTO->getMaxPrice()))
            ->when($catalogFilterDTO->getOrderPrice() !== null, fn($query) => $query->orderBy('price', $catalogFilterDTO->getOrderPrice()))
            ->when($catalogFilterDTO->getOrderModel() !== null, fn($query) => $query->orderBy('name', $catalogFilterDTO->getOrderModel()));
    }
}
