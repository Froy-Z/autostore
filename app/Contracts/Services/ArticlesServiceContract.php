<?php

namespace App\Contracts\Services;

use App\Models\Article;

interface ArticlesServiceContract
{
    public function create(array $fields, array $tags);
    public function update(int $id, array $fields, array $tags = []): Article;
    public function delete(int $id);
}
