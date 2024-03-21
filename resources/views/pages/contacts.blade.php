<x-layouts.inner_two_columns pageTitle="Контактная информация" title="Контактная информация">
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('contacts') }}
    </x-slot>
    <x-slot:content>
        @include('partials.static_demo_content')
    </x-slot:content>
</x-layouts.inner_two_columns>
