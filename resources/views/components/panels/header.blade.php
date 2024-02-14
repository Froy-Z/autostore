<header class="bg-white">
    <div class="border-b">
        <div class="container mx-auto block sm:flex sm:justify-between sm:items-center py-4 px-4 sm:px-0 space-y-4 sm:space-y-0">
            <div class="flex justify-center">
                @section('header-logo')
                    <a href="{{ route('home') }}" class="inline-block sm:inline hover:opacity-75">
                        <img src="/assets/images/logo.png" width="222" height="30" alt="">
                    </a>
                @show
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
                        <a class="inline-block p-4 text-black font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow"
                           href="{{ route('catalog') }}">
                            Легковые
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>

                        <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                            <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="{{ route('catalog') }}">Седаны</a></li>
                            <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="{{ route('catalog') }}">Хетчбеки</a></li>
                            <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="{{ route('catalog') }}">Универсалы</a></li>
                            <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="{{ route('catalog') }}">Купе</a></li>
                            <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="{{ route('catalog') }}">Родстеры</a></li>
                        </ul>
                    </li>
                    <li class="group">
                        <a class="inline-block p-4 text-black font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow"
                           href="{{ route('catalog') }}">
                            Внедорожники
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                            <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="{{ route('catalog') }}">Рамные</a></li>
                            <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="{{ route('catalog') }}">Пикапы</a></li>
                            <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="{{ route('catalog') }}">Кроссоверы</a></li>
                        </ul>
                    </li>
                    <li class="group"><a class="inline-block p-4 text-black font-bold hover:text-orange" href="{{ route('catalog') }}">Раритетные</a></li>
                    <li class="group"><a class="inline-block p-4 text-black font-bold hover:text-orange" href="{{ route('catalog') }}">Распродажа</a></li>
                    <li class="group"><a class="inline-block p-4 text-black font-bold hover:text-orange" href="{{ route('catalog') }}">Новинки</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
