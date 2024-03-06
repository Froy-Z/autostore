<?php

namespace App\Services;

use App\Contracts\Services\SlugServiceContract;
use Illuminate\Support\Str;

class SlugService implements SlugServiceContract
{
    public static function generateSlug(string $title): string
    {
        return Str::slug($title, '-', 'a-zA-Z0-9_-') . '_' . str::uuid();
    }
}
