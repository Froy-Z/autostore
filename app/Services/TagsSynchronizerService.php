<?php

namespace App\Services;

use App\Contracts\Repositories\HasTagsContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use Ramsey\Collection\Collection;

class TagsSynchronizerService implements TagsSynchronizerServiceContract
{
    public function __construct(
        private readonly TagsRepositoryContract $tagsRepository
    ) {
    }

    public function sync(HasTagsContract $model, array $tags)
    {
        $tagsToSync = collect();

        foreach ($tags as $tag) {
            $tagsToSync->push($this->tagsRepository->firstOrCreateByName($tag));
        }

        $this->tagsRepository->syncTags($model, $tagsToSync->pluck('id')->all());

        $this->tagsRepository->deleteUnusedTags();
    }
}
