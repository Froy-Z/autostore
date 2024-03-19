<x-layouts.inner_two_columns pageTitle="Условия продаж" title="Условия продаж">
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('sale') }}
    </x-slot>
    <x-slot:content>
        @include('partials.static_demo_content')
    </x-slot:content>
</x-layouts.inner_two_columns>
