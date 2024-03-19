<x-layouts.app pageTitle="{{ $pageTitle ?? '' }}">
    <x-slot:templateContent>
        {{ $breadcrumbs ?? '' }}
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
            @isset($content)
                {{ $content }}
            @endisset
        </div>
    </x-slot:templateContent>
</x-layouts.app>
