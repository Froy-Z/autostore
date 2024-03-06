<?php

namespace App\Models;

use App\Contracts\Repositories\HasTagsContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model implements HasTagsContract
{
    use HasFactory;


    protected $fillable = [
        'slug',
        'title',
        'description',
        'body',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
