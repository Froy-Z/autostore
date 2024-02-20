@extends('layouts.inner')

@section('page-title', 'Каталог')
@section('title', 'Каталог')

@section('content')
    <x-panels.cars.catalog_filter />
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
        @props(['cars'])
        @foreach($cars as $car)
            <x-panels.cars.cars_item :car="$car" />
        @endforeach
    </div>
    <div class="text-center mt-4">
        <x-panels.slider />
    </div>
@endsection

@section('title', 'Каталог')
