<x-layouts.inner pageTitle="{{ $car->name }}" title="{{ $car->name }}" name="{{ $car->name }}">
    <x-slot:content>
        <div class="flex-1 grid grid-cols-1 lg:grid-cols-5 border-b w-full">
            <div class="col-span-3 border-r-0 sm:border-r pb-4 pr-4 text-center catalog-detail-slick-preview" data-slick-carousel-detail>
                <div class="mb-4 border rounded" data-slick-carousel-detail-items>
                    <img class="w-full" src="/assets/pictures/car_K5-half.png" alt="" title="">
                    <img class="w-full" src="/assets/pictures/car_k5_1.png" alt="" title="">
                    <img class="w-full" src="/assets/pictures/car_k5_2.png" alt="" title="">
                    <img class="w-full" src="/assets/pictures/car_k5_3.png" alt="" title="">
                </div>
                <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2">
                <div class="space-y-4 w-full">
                    <div class="block px-4">
                        <p class="font-bold">Цена:</p>
                        @isset($car->old_price)
                            <p class="text-base line-through text-gray-400"><x-price :price="$car->old_price"/></p>
                        @endisset
                        <p class="font-bold text-2xl text-orange"><x-price :price="$car->price"/></p>
                        <div class="mt-4 block">
                            <form>
                                <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Купить
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="block border-t clear-both w-full" data-accordion data-active>
                        <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
                            <span>Параметры</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-not-active style="display: none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-active>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                        <div class="my-4 px-4" data-accordion-details>
                            <table class="w-full">
                                <x-car_specifications template="specification" :car="$car"/>
                                <tr>
                                    <td class="py-2 text-gray-600 w-1/2">Теги:</td>
                                    <td class="py-2 text-black font-bold w-1/2">
                                        <div>
                                            @if($car->is_new === 1)
                                                <span class="text-sm text-white italic rounded bg-orange px-2">Новинка</span>
                                            @endif
                                            @isset($car->old_price)
                                                <span class="text-sm text-white italic rounded bg-orange px-2">Со скидкой</span>
                                            @endisset
                                            <span class="text-sm text-white italic rounded bg-orange px-2">{{ $car->name }}</span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="block border-t clear-both w-full" data-accordion>
                        <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
                            <span>Описание</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-not-active>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-active style="display: none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <div class="my-4 px-4" data-accordion-details style="display: none">
                            <div class="space-y-4">
                                <p>{{ $car->body }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-layouts.inner>
