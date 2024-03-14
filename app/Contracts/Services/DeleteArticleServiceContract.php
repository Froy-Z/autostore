<?php

namespace App\Contracts\Services;

interface DeleteArticleServiceContract
{
    public function delete(int $id): void;
}
