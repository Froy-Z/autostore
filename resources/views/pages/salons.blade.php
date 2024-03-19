<x-layouts.inner_two_columns pageTitle="Салоны" title="Салоны">
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('salons') }}
    </x-slot>
    <x-slot:content>
        <main class="flex-1 container mx-auto bg-white">
            <x-panels.salons.salons :salons="$salons" />
        </main>
    </x-slot:content>
</x-layouts.inner_two_columns>
