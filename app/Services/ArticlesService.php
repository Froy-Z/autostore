<?php

namespace App\Services;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\CreateArticleServiceContract;
use App\Contracts\Services\DeleteArticleServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\SlugServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Contracts\Services\UpdateArticleServiceContract;
use App\Events\ArticleCreatedEvent;
use App\Events\ArticleDeletedEvent;
use App\Events\ArticleUpdatedEvent;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class ArticlesService implements CreateArticleServiceContract, UpdateArticleServiceContract, DeleteArticleServiceContract
{
    public function __construct(
        private readonly ArticlesRepositoryContract $articlesRepository,
        private readonly SlugServiceContract $slugService,
        private readonly TagsSynchronizerServiceContract $tagsService,
        private readonly ImagesServiceContract $imagesService,
    ) {
    }

    public function create(array $fields, array $tags = []): Article
    {
        return DB::transaction(function () use ($fields, $tags) {
            $slug = $this->slugService->generateSlug($fields['title']);
            if (! empty($fields['image'])) {
                $image = $this->imagesService->createImage($fields['image']);
                $fields['image_id'] = $image->id;
            }
            $article = $this->articlesRepository->create(['slug' => $slug] + $fields);
            $this->tagsService->sync($article, $tags);
            $this->articlesRepository->flushCache();
            Event::dispatch(new ArticleCreatedEvent($article));
            return $article;
        });
    }

    public function update(int $id, array $fields, array $tags = []): Article
    {
        return DB::transaction(function () use ($id, $fields, $tags) {
            $article = $this->articlesRepository->findById($id);
            $oldImageId = null;

            if (! empty($fields['image'])) {
                $image = $this->imagesService->createImage($fields['image']);
                $fields['image_id'] = $image->id;
                $oldImageId = $article->image_id;
            }
            $article = $this->articlesRepository->update($article, $fields);
            $this->tagsService->sync($article, $tags);
            if (! empty($oldImageId)) {
                $this->imagesService->deleteImage($oldImageId);
            }
            $this->articlesRepository->flushCache();
            Event::dispatch(new ArticleUpdatedEvent($article));
            return $article;
        });
    }

    public function delete(int $id): void
    {
        DB::transaction(function () use ($id) {
            $article = $this->articlesRepository->findById($id);
            $this->articlesRepository->delete($id);
            $this->articlesRepository->flushCache();
            Event::dispatch(new ArticleDeletedEvent($article));
        });
    }
}
