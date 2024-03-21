<?php

namespace App\Contracts\Services;

use App\Models\Article;
use App\Models\Tag;

interface StatisticsServiceContract
{
    public function getCountCars(): int;
    public function getCountArticles(): int;
    public function getPopularTag(): Tag;
    public function getLongestArticle(): Article;
    public function getShortestArticle(): Article;
    public function getAverageTagArticles(): float;
    public function getMostTaggerArticle(): Article;
}
