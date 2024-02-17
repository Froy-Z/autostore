<section class="pb-4 px-4">
    <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
        @props(['cars'])
        @foreach($cars as $car)
            <x-panels.cars.cars_item :car="$car" />
        @endforeach
    </div>
</section>

