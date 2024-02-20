<x-layouts.admin pageTitle="Все новости" title="Все новости">
    <x-slot:content>
        <main class="flex-1 container mx-auto bg-white">
            <x-panels.articles.news :articles="$articles" />
        </main>
    </x-slot:content>
</x-layouts.admin>
