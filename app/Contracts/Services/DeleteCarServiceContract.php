<?php

namespace App\Contracts\Services;

interface DeleteCarServiceContract
{
    public function delete(int $id): void;
}
