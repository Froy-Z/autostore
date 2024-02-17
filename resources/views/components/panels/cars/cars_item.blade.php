<div
    class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
    <a class="block w-full h-40" href="{{ route('product', $car->id) }}"><img
            class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_cerato.png"
            alt="{{ $car->name }}"></a>
    <div class="px-6 py-4">
        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="{{ route('product', $car->id) }}">{{ $car->name }}</a>
        </div>
        <p class="text-grey-darker text-base">
            <span class="inline-block"><x-panels.format_price :price="$car->price"/></span>
            @isset ($car->old_price)
                <span class="inline-block line-through pl-6 text-gray-400"><x-panels.format_price :price="$car->old_price"/></span>
            @endisset
        </p>
    </div>
</div>
