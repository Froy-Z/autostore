<?php

namespace App\Contracts\Services;

interface SalonsClientServiceContract
{
    public function getSalons(?int $limit, ?bool $random): ?array;
}
