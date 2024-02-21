<x-layouts.admin pageTitle="Управление моделями" title="Управление моделями">
    <x-slot:content>
        <x-panels.messages.flashes />
        <main class="flex-1 container mx-auto bg-white">
            <x-panels.admin.admin_cars_table :cars="$cars"/>
        </main>
    </x-slot:content>
</x-layouts.admin>
