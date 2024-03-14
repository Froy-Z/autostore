<?php

namespace App\Contracts\Repositories;

use App\Models\Banner;
use Illuminate\Support\Collection;

interface BannersRepositoryContract
{
    public function getRandomBanners(int $limit, array $relations = []): Collection;
}
