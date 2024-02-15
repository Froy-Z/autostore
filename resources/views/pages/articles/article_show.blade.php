@extends('layouts.inner_two_columns')

@section('page-title', $article->title)
@section('title', $article->title)

@section('content')
    <x-panels.articles.news_concrete />
@endsection


