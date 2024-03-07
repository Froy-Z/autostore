<?php

namespace App\Contracts\Repositories;

use App\DTO\CatalogFilterDTO;
use App\Models\Article;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ArticlesRepositoryContract
{
    public function getModel(): Article;
    public function findAll(): Collection;
    public function getPublishedArticles(bool $published, string $orderBy, ?int $limit = null): Article|Collection;
    public function paginateForArticles(
        bool $published,
        string $orderBy,
        array $fields = ["*"],
        int $perPage = 5,
        int $page = 1,
        string $pageName = 'page',
    ): LengthAwarePaginator;
    public function findById(int $id): Article;
    public function findBySlug(string $slug): Article;
    public function create(array $fields): Article;
    public function update(int $id, array $fields): Article;
    public function delete(int $id);
}
