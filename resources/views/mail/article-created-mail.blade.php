<x-mail::message>
# Была создана новая новость

{{ $article->title }}

<x-mail::button :url="route('article.show', $article, true)">
    Перейти
</x-mail::button>

    С Наилучшими пожеланиями ваши, <br>
{{ config('app.name') }}
</x-mail::message>
