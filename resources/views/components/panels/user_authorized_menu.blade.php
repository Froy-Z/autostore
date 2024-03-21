<nav class="flex sm:justify-end sm:items-center flex-col sm:flex-row space-y-2 md:space-y-0 sm:space-x-8 text-sm">
    <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="basket.html">
        <x-icons.shopping_cart class="inline-block text-orange h-4 w-4" />
        <span>99+</span>
    </a>
    <a class="text-black hover:text-orange flex items-center space-x-1" href="{{ route('account') }}">
        <x-icons.user_circle class="inline-block text-orange h-4 w-4" />
        <span class="inline-block font-bold">{{ auth()->user()?->name }}</span>
    </a>
    <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="{{ route('account') }}">
        <x-icons.house class="inline-block text-orange h-4 w-4" />
        <span>Личный кабинет</span>
    </a>
    @admin()
    <a class="text-gray-500 hover:text-orange flex items-center space-x-1" href="{{ route('admin.admin') }}">
        <x-icons.pankakes class="inline-block text-orange h-4 w-4" />
        <span>Админка</span>
    </a>
    @endadmin
    <form method="post" action="{{ route('logout') }}" class="inline-block">
        @csrf
        <button type="submit" class="text-gray-500 hover:text-orange flex items-center space-x-1">
            <x-icons.exit class="inline-block text-orange h-4 w-4" />
            <span>Выйти</span>
        </button>
    </form>
</nav>
