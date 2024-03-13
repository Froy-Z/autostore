<?php

namespace Database\Seeders;

use App\Contracts\Services\ImagesServiceContract;
use App\Models\Article;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::factory()->count(10)->create();
        if (($published = Article::whereNotNull('published_at')->count()) < 5) {
            $unpublishedArticles = Article::whereNull('published_at')->limit(5 - $published);
            $unpublishedArticles->update(['published_at' => now()]);
        }
    }
}
