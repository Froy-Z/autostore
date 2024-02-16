<?php

namespace App\Services;

use Illuminate\Support\Str;

class SlugService
{
    public static function generateSlug(string $title): string
    {
        return Str::slug($title, '-', 'a-zA-Z0-9_-') . '_' . str::uuid();
    }
}
