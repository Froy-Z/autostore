<x-layouts.inner_two_columns pageTitle="Для клиентов" title="Для клиентов">
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('clients') }}
    </x-slot>
    <x-slot:content>
        @include('partials.static_demo_content')
    </x-slot:content>
</x-layouts.inner_two_columns>
