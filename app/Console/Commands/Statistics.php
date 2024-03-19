<?php

namespace App\Console\Commands;

use App\Services\StatisticsService;
use Illuminate\Console\Command;

class Statistics extends Command
{
    protected $signature = 'app:statistics
    {--cars : Общее количество машин}
    {--articles : Общее количество новостей}
    {--popular-tag : Тег, у которого больше всего новостей на сайте}
    {--longest-article : Самая длинная новость}
    {--shortest-article : Самая короткая новость}
    {--average-tag-articles : Среднее количество новостей у тега}
    {--most-tagged-article : Самая тегированная новость}';

    protected $description = 'Отобразить статистику';
    public function handle(StatisticsService $service)
    {
        $options = $this->options();

        if($options['cars']) {
            $carsCount = $service->getCountCars();
            $this->info("Общее количество машин: $carsCount");
        }
        if($options['articles']) {
            $articlesCount = $service->getCountArticles();
            $this->info("Общее количество новостей: $articlesCount");
        }
        if ($options['popular-tag']) {
            $popularTag = $service->getPopularTag();
            $this->info("Самый популярный тег");
            $this->table(['id', 'Имя'], [[
                'id' => $popularTag->id,
                'Имя' => $popularTag->name,
            ]]);
        }
        if($options['longest-article']) {
            $longestArticle = $service->getLongestArticle();
            $length = mb_strlen($longestArticle->body);
            $this->info("Самая длинная новость");
            $this->table(['id', 'Имя', 'Длина (символов)'], [[
                'id' => $longestArticle->id,
                'Имя' => $longestArticle->title,
                'Длина (символов)' => $length,
            ]]);
        }
        if($options['shortest-article']) {
            $shortestArticle = $service->getShortestArticle();
            $length = mb_strlen($shortestArticle->body);
            $this->info("Самая короткая новость");
            $this->table(['id', 'Имя', 'Длина (символов)'], [[
                'id' => $shortestArticle->id,
                'Имя' => $shortestArticle->title,
                'Длина (символов)' => $length,
            ]]);
        }
        if($options['average-tag-articles']) {
            $averageTagArticles = $service->getAverageTagArticles();
            $this->info("Среднее количество новостей у тега: $averageTagArticles");
        }
        if($options['most-tagged-article']) {
            $mostTaggedArticle = $service->getMostTaggerArticle();
            $this->info("Самая тегированная новость");
            $this->table(['id', 'Имя', 'Тегов'], [[
                'id' => $mostTaggedArticle->id,
                'Имя' => $mostTaggedArticle->title,
                'Тегов' => $mostTaggedArticle->tags_count,
            ]]);
        }
    }
}
