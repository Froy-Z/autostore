<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->count(10)->create();
        if (($published = Article::whereNotNull('published_at')->count()) < 5) {
            $unpublishedArticles = Article::whereNull('published_at')->limit(5 - $published);
            $unpublishedArticles->update(['published_at' => now()]);
        }
    }
}
