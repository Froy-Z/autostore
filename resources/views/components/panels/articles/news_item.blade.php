@props(['articles'])
@foreach($articles as $article)
    <div class="w-full flex">
        <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
            <a class="block w-full h-full hover:opacity-75" href="{{ route('article.show', $article) }}">
                <img src="{{ $article->imageUrl }}" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
        </div>
        <div class="px-4 leading-normal">
            <div class="mb-8 space-y-2">
                <div class="text-black font-bold text-xl">
                    <a class="hover:text-orange" href="{{ route('article.show', $article) }}">{{ $article->title }}</a>
                </div>
                <p class="text-gray-600 text-base">
                    <a class="hover:text-orange" href="{{ route('article.show', $article) }}">{{ $article->description }}</a>
                </p>
                @if($article->tags->isNotEmpty())
                    <x-panels.tags_news :tags="$article->tags" />
                @endif
                <div class="flex items-center">
                    <p class="text-sm text-gray-400 italic">{{ isset($article->published_at) ? $article->published_at->format('d M Y') : '' }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
