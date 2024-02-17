<div class="space-y-4">
        @props(['articles'])
        @foreach($articles as $article)
            <x-panels.articles.news_item :article="$article"/>
        @endforeach
    <x-panels.slider />
</div>


