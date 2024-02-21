<section class="pb-4">
    <div class="my-6">
        <x-panels.admin.add_button href="{{ route('admin.cars.create') }}">
            <x-slot:label>Добавить модель</x-slot:label>
        </x-panels.admin.add_button>
    </div>

    <table class="border border-collapse w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">id</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Название модели</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цена с учетом скидки</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цена без скидки</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Новинка</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @props(['cars'])
            @foreach($cars as $car)
                <x-panels.admin.admin_cars_table_item :car="$car" />
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        <x-panels.slider />
    </div>
</section>
