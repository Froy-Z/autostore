<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <title>{{ config('app.name') }} - {{ $pageTitle ?? 'Главная страница' }}</title>
    <link href="/assets/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col">
    @include('partials.header')
    <main class="flex-1 container mx-auto bg-white">
        @isset($templateContent)
            {{ $templateContent }}
        @endisset
    </main>
    @include('partials.footer')
</div>
</body>
</html>
