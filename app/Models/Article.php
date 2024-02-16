<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
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

}