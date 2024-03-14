<?php

namespace App\Contracts\Services;

use App\Models\Article;

interface CreateArticleServiceContract
{
    public function create(array $fields, array $tags = []): Article;
}
