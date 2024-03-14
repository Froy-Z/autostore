<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CarsRepository implements CarsRepositoryContract
{
    use FlushCache;
    protected function cacheTags(): array
    {
        return ['cars'];
    }
    public function __construct(
        private readonly Car $model,
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
    public function getNewCars(int $limit, array $relations = []): Car|Collection
    {
        return Cache::tags(['cars', 'image'])->remember(
            sprintf('mainPageCars|%s|%s', $limit, implode('|', $relations)),
            3600,
            fn () => $this->getModel()->newQuery()
                ->where('is_new', '=', true)
                ->with($relations)
                ->take($limit)
                ->get()
        );
    }
    public function findById(int $id, array $relations = []): Car
    {
        return Cache::tags(['cars', 'carClass','engine', 'body', 'tags', 'categories', 'images', 'image'])->remember(
            sprintf('carsById|%s|%s', $id, implode('|', $relations)),
            3600,
            fn () =>$this->getModel()
                ->with($relations)
                ->findOrFail($id)
        );
    }

    public function create(array $fields): Car
    {
        return $this->getModel()->create($fields);
    }

    public function update(Car $car, array $fields): Car
    {
        $car->update($fields);
        return $car;
    }

    public function delete(int $id)
    {
        $this->getModel()->where('id', $id)->delete();
    }

    public function paginateForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array $fields = ["*"],
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
        array $relations = [],
    ): LengthAwarePaginator {
        return Cache::tags(['cars', 'image'])->remember(
            sprintf(
                'paginateForCatalog|%s',
                serialize([
                    'filter' => $catalogFilterDTO,
                    'fields' => $fields,
                    'perPage' => $perPage,
                    'page' => $page,
                    'pageName' => $pageName,
                    'relations' => $relations,
                ])
            ),
            3600,
            fn () => $this->catalogQuery($catalogFilterDTO)
                ->with($relations)
                ->paginate($perPage, $fields, $pageName, $page));
    }

    private function catalogQuery(CatalogFilterDTO $catalogFilterDTO): Builder
    {
        return $this->getModel()->newQuery()
            ->when($catalogFilterDTO->getModel() !== null, fn($query) => $query->where('name', 'like', '%' . $catalogFilterDTO->getModel() . '%'))
            ->when($catalogFilterDTO->getMinPrice() !== 0, fn($query) => $query->where('price', '>=', $catalogFilterDTO->getMinPrice()))
            ->when($catalogFilterDTO->getMaxPrice() !== 0, fn($query) => $query->where('price', '<=', $catalogFilterDTO->getMaxPrice()))
            ->when($catalogFilterDTO->getOrderPrice() !== null, fn($query) => $query->orderBy('price', $catalogFilterDTO->getOrderPrice()))
            ->when($catalogFilterDTO->getOrderModel() !== null, fn($query) => $query->orderBy('name', $catalogFilterDTO->getOrderModel()))
            ->when($catalogFilterDTO->getAllCategories(), fn ($query) => $query->whereHas('categories', fn ($query) => $query->whereIn('id', $catalogFilterDTO->getAllCategories())));
    }

    public function syncCategories(Car $car, array $categories = []): Car
    {
        $car->categories()->sync($categories);
        return $car;
    }
}
