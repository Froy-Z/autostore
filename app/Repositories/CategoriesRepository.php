<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Models\Category;

class CategoriesRepository implements CategoriesRepositoryContract
{

    public function __construct(
        private readonly Category $model
    ) {
    }

    public function getModel(): Category
    {
        return $this->model;
    }

    public function findBySlug(string $slug, array $relations = []): Category
    {
        return $this->getModel()
            ->where('slug', '=', $slug)
            ->when($relations, fn ($query) => $query->with($relations))
            ->firstOrFail();
    }
}
