<x-layouts.inner_two_columns pageTitle="Финансовый отдел" title="Финансовый отдел">
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('finance') }}
    </x-slot>
    <x-slot:content>
        @include('partials.static_demo_content')
    </x-slot:content>
</x-layouts.inner_two_columns>
