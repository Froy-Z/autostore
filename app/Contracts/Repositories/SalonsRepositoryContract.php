<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface SalonsRepositoryContract
{
    public function findAll(): ?Collection;
    public function getRandomSalons(int $limit, bool $random): ?Collection;
}
