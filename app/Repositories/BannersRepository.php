<?php

namespace App\Repositories;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Collection;

class BannersRepository implements BannersRepositoryContract
{

    public function __construct(
        private readonly Banner $model,
    ) {
    }

    public function getRandomBanners(int $limit): Collection
    {
        return $this->model::inRandomOrder()->limit($limit)->get();
    }
}
