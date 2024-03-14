<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ArticlesRepository implements ArticlesRepositoryContract
{
    use FlushCache;
    protected function cacheTags(): array
    {
        return ['articles'];
    }

    use FlushCache;
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

    public function getPublishedArticles(bool $published, string $orderBy, ?int $limit = null, array $relations = []): Collection|Article
    {
        return Cache::tags(['articles', 'image', 'tags'])->remember(
            sprintf('publishedArticles|%s|%s|%d', $published,
                implode('|', [$orderBy]),
                implode('|', [$limit])
            ),
        3600,
            function () use ($published, $orderBy, $limit, $relations) {
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
                $query->with($relations);
                return $query->get();
            }
        );
    }

    public function findById(int $id): Article
    {
        return Cache::tags(['articles', 'images'])->remember(
            "articlesById|{$id}",
            3600,
            fn () =>$this->getModel()->findOrFail($id)
        );
    }
    public function findBySlug(string $slug, array $relations = []): Article
    {
        return Cache::tags(['articles', 'image', 'tags'])->remember(
            sprintf('findArticleBySlug|%s|%s', $slug, implode('|', $relations)),
            3600,
            fn () => $this->getModel()->newQuery()
                ->where('slug', '=', $slug)
                ->with($relations)
                ->firstOrFail()
        );

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
        array $relations = [],
        string $pageName = 'page',
    ): LengthAwarePaginator {
        return Cache::tags(['articles', 'image', 'tags'])->remember(
            sprintf(
                'paginateForCatalog|%s',
                serialize([
                    'published' => $published,
                    'orderBy' => $orderBy,
                    'fields' => $fields,
                    'perPage' => $perPage,
                    'page' => $page,
                    'pageName' => $pageName,
                ])
            ),
            3600,
            function () use ($published, $orderBy, $perPage, $pageName, $page, $relations) {
                $query = $this->getModel()->newQuery();
                if ($published) {
                    $query->whereNotNull('published_at');
                }
                if (strtolower($orderBy) === 'asc') {
                    $query->orderBy('published_at');
                } else {
                    $query->orderByDesc('published_at');
                }
                $query->with($relations);
                return $query->paginate($perPage, ['*'], $pageName, $page);
            }
        );
    }
}
