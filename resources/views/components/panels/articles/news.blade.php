<div class="space-y-4">
        @foreach($articles as $article)
            @include('components.panels.articles.news_item', ['article' => $article])
        @endforeach
    @include('components.panels.articles.news_slider')
</div>


