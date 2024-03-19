<?php

namespace App\Services;

use App\Contracts\Services\StatisticsServiceContract;
use App\Models\Article;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class StatisticsService implements StatisticsServiceContract
{
    public function getCountCars(): int
    {
        return Car::query()->count();
    }
    public function getCountArticles(): int
    {
        return Article::query()->count();
    }
    public function getPopularTag(): Tag
    {
        return Tag::query()
            ->withCount('articles')
            ->orderByDesc('articles_count')
            ->first();
    }
    public function getLongestArticle(): Article
    {
        return Article::query()
            ->orderByDesc(DB::raw('char_length(body)'))
            ->first();
    }
    public function getShortestArticle(): Article
    {
        return Article::query()
            ->orderBy(DB::raw('char_length(body)'))
            ->first();
    }
    public function getAverageTagArticles(): float
    {
        return Tag::query()
            ->withCount('articles')
            ->get()
            ->filter(function ($tag) {
                return $tag->articles_count > 0;
            })
            ->avg('articles_count');
    }
    public function getMostTaggerArticle(): Article
    {
        return Article::query()
            ->withCount('tags')
            ->orderByDesc('tags_count')
            ->first();
    }
}
