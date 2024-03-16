<?php

namespace App\Contracts\Services;

interface SalonsClientServiceContract
{
    public function findAll(): ?array;
    public function getRandomSalons(int $limit, bool $random): ?array;
}
