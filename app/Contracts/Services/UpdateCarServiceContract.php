<?php

namespace App\Contracts\Services;

use App\Models\Car;

interface UpdateCarServiceContract
{
    public function update(int $id, array $fields, array $tags = []): Car;
}
