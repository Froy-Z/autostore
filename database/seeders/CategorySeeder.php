<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Легковые',
                'children' => [
                    ['name' => 'Седаны'],
                    ['name' => 'Хетчбеки'],
                    ['name' => 'Универсалы'],
                    ['name' => 'Купе'],
                    ['name' => 'Родстеры'],
                ],
            ],
            [
                'name' => 'Внедорожники',
                'children' => [
                    ['name' => 'Рамные'],
                    ['name' => 'Пикапы'],
                    ['name' => 'Кроссоверы'],
                ],
            ],
            ['name' => 'Раритетные'],
            ['name' => 'Распродажа'],
            ['name' => 'Новинки'],
        ];

        foreach ($this->categoriesSlugAndSort($categories) as $category) {
            Category::create($category);
        }
    }

    private function categoriesSlugAndSort(array $categories): array
    {
        array_walk($categories, function (&$category) {
            if (isset($category['children'])) {
                $category['children'] = $this->categoriesSlugAndSort($category['children']);
            }

            $category['slug'] = Str::slug($category['name']);
            $category['sort'] = (int)(ord($category['name'][1]).ord($category['name'][3]));
        });

        return $categories;
    }
}
