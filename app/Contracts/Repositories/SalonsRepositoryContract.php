<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface SalonsRepositoryContract
{
    public function getSalons(?int $limit = null, ?bool $random = null): ?Collection;
}
