@extends('layouts.app')

@section('navigation-menu')
    <x-panels.admin.navigation_menu/>
@endsection

@section('template-content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>

        @yield('content')
    </div>
@endsection

@section('footer-navigation', '')
