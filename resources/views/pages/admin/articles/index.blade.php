@extends('layouts.admin')

@section('page-title', 'Все новости')
@section('title', 'Все новости')

@section('content')
    <main class="flex-1 container mx-auto bg-white">
        <x-panels.articles.news :articles="$articles" />
    </main>
@endsection
