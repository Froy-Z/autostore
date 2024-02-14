@extends('layouts.app')

@section('page-title', 'Главная страница')

@push('styles')
    <link href="assets/css/main_page_template_styles.css" rel="stylesheet">
@endpush

@section('template-content')
    <section class="slider">
        <div data-slick-carousel>
            <div class="relative banner">
                <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="assets/pictures/test_banner_1.jpg" alt="" title=""></div>
                <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                    <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Астон Мартин, получи секретное Задание</h1>
                    <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
                </div>
            </div>
            <div class="relative banner">
                <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="assets/pictures/test_banner_2.jpg" alt="" title=""></div>
                <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                    <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Роллс Ройс, получи Отчество к&nbsp;своему имени</h1>
                    <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
                </div>
            </div>
            <div class="relative banner">
                <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="assets/pictures/test_banner_3.jpg" alt="" title=""></div>
                <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                    <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Бентли, получи бейсболку</h1>
                    <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-4 px-4">
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="assets/pictures/car_cerato.png" alt="Cerato"></a>
                <div class="px-6 py-4">
                    <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">Cerato</a></div>
                    <p class="text-grey-darker text-base">
                        <span class="inline-block">1 221 900 ₽</span><span class="inline-block line-through pl-6 text-gray-400">1 821 900 ₽</span>
                    </p>
                </div>
            </div>
            <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="assets/pictures/car_rio-x.png" alt="Rio X"></a>
                <div class="px-6 py-4">
                    <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">Rio X</a></div>
                    <p class="text-grey-darker text-base">
                        <span class="inline-block">969 900 ₽</span>
                    </p>
                </div>
            </div>
            <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="assets/pictures/car_mohave_new.png" alt="Mohave"></a>
                <div class="px-6 py-4">
                    <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">Mohave</a></div>
                    <p class="text-grey-darker text-base">
                        <span class="inline-block">3 549 900 ₽</span>
                    </p>
                </div>
            </div>
            <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="assets/pictures/car_K5-half.png" alt="K5"></a>
                <div class="px-6 py-4">
                    <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">K5</a></div>
                    <p class="text-grey-darker text-base">
                        <span class="inline-block">1 577 900 ₽</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="news-block-inverse px-4 py-4">
        <div>
            <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
            <span class="inline-block text-gray-200 pl-1"> / <a href="news.html" class="inline-block pl-1 text-gray-200 hover:text-orange"><b>Все</b></a></span>
        </div>
        <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="w-full flex">
                <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                    <a class="block w-full h-full hover:opacity-75" href="article.html"><img src="assets/pictures/car_ceed.png" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
                </div>
                <div class="px-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <div class="text-white font-bold text-xl mb-2">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип</a>
                        </div>
                        <p class="text-gray-300 text-base">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку</a>
                        </p>
                    </div>
                    <div>
                        <span class="text-sm text-white italic rounded bg-orange px-2">Киа Seed</span>
                    </div>
                    <div class="flex items-center">
                        <p class="text-sm text-gray-400 italic">01 Янв 2022</p>
                    </div>
                </div>
            </div>
            <div class="w-full flex">
                <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                    <a class="block w-full h-full hover:opacity-75" href="article.html"><img src="assets/pictures/car_k900.png" class="bg-white bg-opacity-25 w-full h-full  object-contain" alt=""></a>
                </div>
                <div class="px-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <div class="text-white font-bold text-xl mb-2">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип</a>
                        </div>
                        <p class="text-gray-300 text-base">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку</a>
                        </p>
                    </div>
                    <div>
                        <span class="text-sm text-white italic rounded bg-orange px-2">Парадигма</span>
                        <span class="text-sm text-white italic rounded bg-orange px-2">Архетип</span>
                        <span class="text-sm text-white italic rounded bg-orange px-2">Киа Seed</span>
                    </div>
                    <div class="flex items-center">
                        <p class="text-sm text-gray-400 italic">01 Янв 2022</p>
                    </div>
                </div>
            </div>
            <div class="w-full flex">
                <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                    <a class="block w-full h-full hover:opacity-75" href="article.html"><img src="assets/pictures/car_soul.png" class="bg-white bg-opacity-25 w-full h-full  object-contain" alt=""></a>
                </div>
                <div class="px-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <div class="text-white font-bold text-xl mb-2">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип</a>
                        </div>
                        <p class="text-gray-300 text-base">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку</a>
                        </p>
                    </div>
                    <div>
                        <span class="text-sm text-white italic rounded bg-orange px-2">Это</span>
                        <span class="text-sm text-white italic rounded bg-orange px-2">Теги</span>
                    </div>
                    <div class="flex items-center">
                        <p class="text-sm text-gray-400 italic">01 Янв 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('header-logo')
    <span class="inline-block sm:inline">
        <img src="assets/images/logo.png" width="222" height="30" alt="">
    </span>
@endsection

<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="assets/css/form.min.css" rel="stylesheet">
    <link href="assets/css/tailwind.css" rel="stylesheet">
    <link href="assets/css/base.css" rel="stylesheet">

    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>

    <link href="assets/js/vendor/slick.css" rel="stylesheet">
    <script src="assets/js/vendor/slick.min.js"></script>

    <script src="assets/js/script.js"></script>
    <title>Рога и Сила - Главная страница</title>
    <link href="assets/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col">
    <header class="bg-white">
        <div class="border-b">
            <div class="container mx-auto block sm:flex sm:justify-between sm:items-center py-4 px-4 sm:px-0 space-y-4 sm:space-y-0">
                <div class="flex justify-center">

                </div>
                <div>
                    <ul class="flex justify-center sm:justify-end items-center space-x-8 text-sm">
                        <li>
                            <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="authorized.html">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Регистрация</span>
                            </a>
                        </li>
                        <li>
                            <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="form.html">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Авторизация</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="border-b">
            <div class="container mx-auto block lg:flex justify-between items-center px-2 sm:px-0">
                <form name="search_form" class="bg-gray-100 rounded-full flex items-center px-3 text-sm order-2 my-4 lg:my-0">
                    <label for="search-input" class="hidden"></label>
                    <input id="search-input" type="text" placeholder="Поиск по сайту" class="bg-gray-100 rounded-full py-1 px-1 focus:outline-none placeholder-opacity-50 flex-1 border-none focus:shadow-none focus:ring-0">
                    <button type="submit" class="group focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-black group-hover:text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>

                <nav class="order-1">
                    <ul class="block lg:flex">
                        <li class="group">
                            <a class="inline-block p-4 text-black font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow" href="catalog.html">
                                Легковые
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>

                            <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                                <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="catalog.html">Седаны</a></li>
                                <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="catalog.html">Хетчбеки</a></li>
                                <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="catalog.html">Универсалы</a></li>
                                <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="catalog.html">Купе</a></li>
                                <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="catalog.html">Родстеры</a></li>
                            </ul>
                        </li>
                        <li class="group">
                            <a class="inline-block p-4 text-black font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow" href="catalog.html">
                                Внедорожники
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>
                            <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                                <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="catalog.html">Рамные</a></li>
                                <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="catalog.html">Пикапы</a></li>
                                <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="catalog.html">Кроссоверы</a></li>
                            </ul>
                        </li>
                        <li class="group"><a class="inline-block p-4 text-black font-bold hover:text-orange" href="catalog.html">Раритетные</a></li>
                        <li class="group"><a class="inline-block p-4 text-black font-bold hover:text-orange" href="catalog.html">Распродажа</a></li>
                        <li class="group"><a class="inline-block p-4 text-black font-bold hover:text-orange" href="catalog.html">Новинки</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="flex-1 container mx-auto bg-white">
    </main>
    <footer class="container mx-auto">
        <section class="block sm:flex bg-white p-4">
            <div class="flex-1">
                <div>
                    <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
                    <span class="inline-block pl-1"> / <a href="salons.html" class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
                </div>

                <div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
                    <div class="w-full flex">
                        <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
                            <a class="block w-full h-full hover:opacity-75" href="salons.html"><img src="assets/pictures/test_salon_1.jpg" class="w-full h-full object-cover" alt=""></a>
                        </div>
                        <div class="px-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <div class="text-black font-bold text-xl mb-2">
                                    <a class="hover:text-orange" href="salons.html">Салон на братиславской</a>
                                </div>
                                <div class="text-base space-y-2">
                                    <p class="text-gray-400">Москва, ул. Братиславская, дом 23</p>
                                    <p class="text-black">+7 495 987 65 43</p>
                                    <p class="text-sm">Часы работы:<br> c 9.00 до 21.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex">
                        <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
                            <a class="block w-full h-full hover:opacity-75" href="salons.html"><img src="assets/pictures/test_salon_2.jpg" class="w-full h-full object-cover" alt=""></a>
                        </div>
                        <div class="px-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <div class="text-black font-bold text-xl mb-2">
                                    <a class="hover:text-orange" href="salons.html">Салон на братиславской</a>
                                </div>
                                <div class="text-base space-y-2">
                                    <p class="text-gray-400">Москва, ул. Братиславская, дом 23</p>
                                    <p class="text-black">+7 495 987 65 43</p>
                                    <p class="text-sm">Часы работы:<br> c 9.00 до 21.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
                <p class="text-3xl text-black font-bold mb-4">Информация</p>
                <nav>
                    <ul class="bullet-list-item">
                        <li><a class="text-gray-600 hover:text-orange" href="inner.html">О компании</a></li>
                        <li><a class="text-orange cursor-default"      href="inner.html">Контактная информация</a></li>
                        <li><a class="text-gray-600 hover:text-orange" href="inner.html">Условия продаж</a></li>
                        <li><a class="text-gray-600 hover:text-orange" href="inner.html">Финансовый отдел</a></li>
                        <li><a class="text-gray-600 hover:text-orange" href="inner.html">Для клиентов</a></li>
                    </ul>
                </nav>
            </div>
        </section>


        <div class="space-y-4 sm:space-y-0 sm:flex sm:justify-between items-center py-6 px-2 sm:px-0">
            <div class="copy pr-8">© 2023 Рога &amp; Сила. Продажа автомобилей.</div>
            <div class="text-right">
                <a href="https://www.qsoft.ru" target="_blank" class="inline-block">Сделано в <img class="ml-2 inline-block" src="assets/images/qsoft.png" width="59" height="11" alt=""/></a>
            </div>
        </div>
    </footer>
</div>

</body>
</html>
