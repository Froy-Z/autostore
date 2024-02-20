<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface FlashMessageContract
{
    public function success(array|string $messages): void;
    public function error(array|string $messages): void;
    public function successMessages(): Collection;
    public function errorMessages(): Collection;
}
