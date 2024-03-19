<x-layouts.inner_two_columns pageTitle="{{ $article->title }}" title="{{ $article->title }}">
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('article.show', $article) }}
    </x-slot>
    <x-slot:content>
        <x-panels.articles.news_concrete :article="$article"/>
    </x-slot:content>
</x-layouts.inner_two_columns>

