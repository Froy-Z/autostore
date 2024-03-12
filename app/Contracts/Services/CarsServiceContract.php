<?php

namespace App\Contracts\Services;

use App\Models\Car;

interface CarsServiceContract
{
    public function create(array $fields, array $tags): Car;
    public function update(int $id, array $fields, array $tags = []): Car;
    public function delete(int $id);
}
