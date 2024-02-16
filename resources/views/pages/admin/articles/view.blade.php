@extends('layouts.admin')

@section('page-title', 'Управление новостями')
@section('title', 'Управление новостями')

@section('content')
    @if(session()->has('success_messages'))
        <x-panels.messages.success :messages="session('success_messages', [])" />
    @endif

    <main class="flex-1 container mx-auto bg-white">
        <x-panels.admin.admin_articles_table :articles="$articles"/>
    </main>
@endsection
