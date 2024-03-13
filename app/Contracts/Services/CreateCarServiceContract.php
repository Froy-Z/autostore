<?php

namespace App\Contracts\Services;

use App\Models\Car;

interface CreateCarServiceContract
{
    public function create(array $fields, array $tags): Car;
}
