<x-layouts.app pageTitle="Главная страница">
    <x-slot:headerLogo>
        <span class="inline-block sm:inline">
            <img src="/assets/images/logo.png" width="222" height="30" alt="">
        </span>
    </x-slot:headerLogo>
    <x-slot:templateContent>
        <main class="flex-1 container mx-auto bg-white">
            <x-panels.homepage.banners :banners="$banners" />
            @if($cars->isNotEmpty())
                <x-panels.homepage.new_models :cars="$cars" />
            @endif
            <x-panels.homepage.news :articles="$articles" />
        </main>
    </x-slot:templateContent>
</x-layouts.app>
