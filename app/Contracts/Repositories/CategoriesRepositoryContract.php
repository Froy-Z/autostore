<?php

namespace App\Contracts\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoriesRepositoryContract
{
    public function getModel(): Category;
    public function findAll(): Collection;
    public function findBySlug(string $slug, array $relations = []): Category;
    public function getCategoriesTree(): Collection;
}
