<?php

namespace App\Contracts\Repositories;

use App\DTO\CatalogFilterDTO;
use App\Models\Article;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ArticlesRepositoryContract extends FlushCacheRepositoryContract
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
        array $relations = [],
        string $pageName = 'page',
    ): LengthAwarePaginator;
    public function findById(int $id): Article;
    public function findBySlug(string $slug, array $relations = []): Article;
    public function create(array $fields): Article;
    public function update(Article $article, array $fields): Article;
    public function delete(int $id);
}
