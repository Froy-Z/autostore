<x-layouts.inner_two_columns pageTitle="О компании" title="О компании">
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('about') }}
    </x-slot>
    <x-slot:content>
        @include('partials.static_demo_content')
    </x-slot:content>
</x-layouts.inner_two_columns>
