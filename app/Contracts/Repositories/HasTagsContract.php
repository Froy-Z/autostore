<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface HasTagsContract
{
    public function tags(): MorphToMany;
}
