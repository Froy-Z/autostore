<?php

namespace App\Contracts\Services;

use App\Models\Article;

interface UpdateArticleServiceContract
{
    public function update(int $id, array $fields, array $tags = []): Article;
}
