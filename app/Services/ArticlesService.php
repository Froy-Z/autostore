<?php

namespace App\Services;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\ArticlesServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\SlugServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Models\Article;

class ArticlesService implements ArticlesServiceContract
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
        $slug = $this->slugService->generateSlug($fields['title']);
        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
        }
        $article = $this->articlesRepository->create(['slug' => $slug] + $fields);
        $this->tagsService->sync($article, $tags);
        return $article;
    }

    public function update(int $id, array $fields, array $tags = []): Article
    {
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
        return $article;
    }

    public function delete(int $id)
    {
        $this->articlesRepository->delete($id);
    }
}
