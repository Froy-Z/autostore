<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ArticlesRepository implements ArticlesRepositoryContract
{
    public function __construct(
        private readonly Article $model,
    ) {
    }

    public function getModel(): Article
    {
        return $this->model;
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function getPublishedArticles(bool $published, string $orderBy, ?int $limit = null): Collection|Article
    {
        $query = $this->getModel()->newQuery();

        if ($published) {
            $query->whereNotNull('published_at');
        }

        if(strtolower($orderBy) === 'asc') {
            $query->orderBy('published_at');
        } else {
            $query->orderByDesc('published_at');
        }

        if($limit !== null) {
            $query->take($limit);
        }

        return $query->get();
    }

    public function findById(int $id): Article
    {
        return $this->getModel()->findOrFail($id);
    }
    public function findBySlug(string $slug): Article
    {
        return $this->getModel()->where('slug', '=', $slug)->firstOrFail();
    }

    public function create(array $fields): Article
    {
        return $this->getModel()->create($fields);
    }

    public function update(Article $article, array $fields): Article
    {
        $article->update($fields);
        return $article;
    }

    public function delete(int $id)
    {
        $this->getModel()->where('id', $id)->delete();
    }

    public function paginateForArticles(
        bool $published,
        string $orderBy,
        array $fields = ["*"],
        int $perPage = 5,
        int $page = 1,
        string $pageName = 'page',
    ): LengthAwarePaginator {
        $query = $this->getModel()->newQuery();
        if ($published) {
            $query->whereNotNull('published_at');
        }
        if(strtolower($orderBy) === 'asc') {
            $query->orderBy('published_at');
        } else {
            $query->orderByDesc('published_at');
        }
        return $query->paginate($perPage, ['*'], $pageName, $page);
    }
}
