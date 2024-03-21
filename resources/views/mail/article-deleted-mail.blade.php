<x-mail::message>
# Была удалена новость

{{ $article->title }}

<x-mail::button :url="route('admin.articles.index')">
    Все новости
</x-mail::button>

    С Наилучшими пожеланиями ваши, <br>
{{ config('app.name') }}
</x-mail::message>
