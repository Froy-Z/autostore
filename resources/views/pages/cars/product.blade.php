<x-layouts.inner pageTitle="{{ $car->name }}" title="{{ $car->name }}" name="{{ $car->name }}">
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('product', $car) }}
    </x-slot>
    <x-slot:content>
        <div class="flex-1 grid grid-cols-1 lg:grid-cols-5 border-b w-full">
            <div class="col-span-3 border-r-0 sm:border-r pb-4 pr-4 text-center catalog-detail-slick-preview"
                 data-slick-carousel-detail>
                <div class="mb-4 border rounded" data-slick-carousel-detail-items>
                    <img class="w-full" src="{{ $car->imageUrl }}" alt="{{ $car->name }}">
                    @foreach($car->images as $image)
                        <img class="w-full" src="{{ $image->url }}" alt="{{ $car->name }}">
                    @endforeach
                </div>
                <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2">
                <div class="space-y-4 w-full">
                    <div class="block px-4">
                        <p class="font-bold">Цена:</p>
                        @isset($car->old_price)
                            <p class="text-base line-through text-gray-400">
                                <x-price :price="$car->old_price"/>
                            </p>
                        @endisset
                        <p class="font-bold text-2xl text-orange">
                            <x-price :price="$car->price"/>
                        </p>
                        <div class="mt-4 block">
                            <form>
                                <x-forms.submit_button>
                                    <x-icons.basket class="inline-block h-6 w-6 mr-2"/>
                                    Купить
                                </x-forms.submit_button>
                            </form>
                        </div>
                    </div>
                    <x-panels.accordion>
                        <x-slot:label>Параметры</x-slot:label>
                        <x-panels.catalog.detail_product_props>
                            <x-car_specifications :car="$car"/>
                            @if($car->tags->isNotEmpty())
                                <x-panels.tags :tags="$car->tags" />
                            @endif
                        </x-panels.catalog.detail_product_props>
                    </x-panels.accordion>
                    <x-panels.accordion>
                        <x-slot:label>Описание</x-slot:label>
                        <div class="space-y-4">
                            <p>{{ $car->description }}</p>
                        </div>
                    </x-panels.accordion>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-layouts.inner>
