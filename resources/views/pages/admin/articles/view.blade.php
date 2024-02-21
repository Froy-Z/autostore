<x-layouts.admin pageTitle="Управление новостями" title="Управление новостями">
    <x-slot:content>
        <x-panels.messages.flashes />
        <main class="flex-1 container mx-auto bg-white">
            <x-panels.admin.admin_articles_table :articles="$articles"/>
        </main>
    </x-slot:content>
</x-layouts.admin>
