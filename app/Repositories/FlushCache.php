<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

trait FlushCache
{
    abstract protected function cacheTags(): array;
    public function flushCache(): void
    {
        Cache::tags($this->cacheTags())->flush();
    }
}
