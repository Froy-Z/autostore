<x-layouts.app pageTitle="{{ $pageTitle ?? '' }}">
    <x-slot:postMenu>
        <nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center space-x-2">
            <a class="hover:text-orange" href="{{ route('home') }}">Главная</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
            </svg>
            <a class="hover:text-orange" href=" {{ route('catalog') }}">Каталог</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
            </svg>
            <a class="hover:text-orange" href=" {{ route('catalog') }}">Легковые</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
            </svg>
            <span>Седан</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
            </svg>
            <span>{{ $name ?? '' }}</span>
        </nav>
    </x-slot:postMenu>
    <x-slot:templateContent>
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
            @isset($content)
                {{ $content }}
            @endisset
        </div>
    </x-slot:templateContent>
</x-layouts.app>
