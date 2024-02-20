<x-layouts.app pageTitle="{{ $pageTitle ?? '' }}">
    <x-slot:navigationMenu>
        <x-panels.admin.navigation_menu/>
    </x-slot:navigationMenu>

    <x-slot:templateContent>
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
            @isset($content)
                {{ $content }}
            @endisset
        </div>
    </x-slot:templateContent>

    <x-slot:footerNavigation>
    </x-slot:footerNavigation>
</x-layouts.app>
