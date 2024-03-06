<?php

namespace App\Contracts\Services;

interface SlugServiceContract
{
    public static function generateSlug(string $title): string;
}
