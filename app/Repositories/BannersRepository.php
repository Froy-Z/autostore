<?php

namespace App\Repositories;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BannersRepository implements BannersRepositoryContract
{

    public function __construct(
        private readonly Banner $model,
    ) {
    }

    public function getRandomBanners(int $limit, array $relations = []): Collection
    {
        return Cache::remember(
            "randomBanners|$limit",
            3600,
            fn () => $this->model::inRandomOrder()
                ->with($relations)
                ->limit($limit)->get()
            );
    }
}
