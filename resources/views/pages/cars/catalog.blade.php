<x-layouts.inner pageTitle="Каталог" title="Каталог">
    <x-slot:content>
        <x-panels.catalog.filter />
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
            @props(['cars'])
            @forelse($cars as $car)
                <x-panels.catalog.cars_item :car="$car" class="my-4" method="get"/>
            @empty
                <p class="p-4 italic text-xl">Модели не найдены</p>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <x-panels.slider />
        </div>
    </x-slot:content>
</x-layouts.inner>
