<?php

namespace App\Contracts\Repositories;

use App\Models\Car;
use Illuminate\Support\Collection;

interface CarsRepositoryContract
{
    public function findAll(): Collection;
    public function getModel(): Car;
}
