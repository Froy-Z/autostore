@extends('layouts.inner_two_columns')

@section('page-title', $article->title)
@section('title', $article->title)

@section('content')
    @include('components.panels.articles.news_concrete')
@endsection


