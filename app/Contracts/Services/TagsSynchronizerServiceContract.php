<?php

namespace App\Contracts\Services;

use App\Contracts\Repositories\HasTagsContract;
use Ramsey\Collection\Collection;

interface TagsSynchronizerServiceContract
{
    public function sync(HasTagsContract $model, array $tags);
}
