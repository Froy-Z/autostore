<x-layouts.inner pageTitle="Каталог" title="Каталог">
    <x-slot:content>
        <x-panels.catalog.filter :filterValues="$catalogData->filter"/>
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
            <x-panels.catalog.cars_item :cars="$catalogData->cars" class="my-4" method="get"/>
        </div>
        <div class="text-center mt-4">
            <x-panels.pagination :paginator="$catalogData->cars" />
        </div>
    </x-slot:content>
</x-layouts.inner>
