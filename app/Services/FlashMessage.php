<?php

namespace App\Services;

use Illuminate\Support\Collection;

class FlashMessage
{
    public function success(array|string $messages): void
    {
        $this->flash('success_messages', collect((array) $messages));
    }

    public function error(array|string $messages): void
    {
        $this->flash('error_messages', collect((array) $messages));
    }

    public function successMessages(): Collection
    {
        return $this->storage()->get('success_messages', collect());
    }

    public function errorMessages(): Collection
    {
        return $this->storage()->get('error_messages', collect());
    }

    private function flash(string $type, Collection $collection): void
    {
        $this->storage()->flush($type, $collection);
    }

    private function storage()
    {
        return session();
    }
}
