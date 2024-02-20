@php use App\Models\Article;@endphp
@extends('layouts.admin')

@section('page-title', "Веб-форма")
@section('title', 'Веб-форма')

@section('content')
    <main class="flex-1 container mx-auto bg-white">

        <x-panels.messages.flashes />
        <x-panels.messages.form_validation_errors :messages="$messages ?? '' " />

        <form action="{{ route('admin.articles.store') }}" method="post">
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">

                    <x-panels.articles.form :article="new Article()"/>

                    <div class="block">
                        <button
                            class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Сохранить
                        </button>
                        <a
                            href="{{ route('admin.view') }}"
                            class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Отменить
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
