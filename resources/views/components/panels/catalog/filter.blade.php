@props(['filterValues', 'currentCategory'])
<form {{ $attributes->merge(['class' => 'border rounded p-4 space-y-4' ]) }} >
    <div class="block sm:flex space-y-2 sm:space-y-0 sm:space-x-4 w-full">
        <x-forms.groups.filter_group for="fieldFilterName">
            <x-slot:label>Модель</x-slot:label>
            <x-forms.inputs.text
                id="fieldFilterName"
                name="model"
                value="{{ $filterValues->getModel() }}"
                placeholder=""
            />

        </x-forms.groups.filter_group>

        <x-forms.groups.filter_group for="fieldFilterPriceFrom">
            <x-slot:label>Цена от:</x-slot:label>
            <x-forms.inputs.text
                id="fieldFilterPriceFrom"
                name="min_price"
                value="{{ $filterValues->getMinPrice() ?: '' }}"
                placeholder=""
            />
        </x-forms.groups.filter_group>

        <x-forms.groups.filter_group for="fieldFilterPriceTo">
            <x-slot:label>Цена до:</x-slot:label>
            <x-forms.inputs.text
                id="fieldFilterPriceFrom"
                name="max_price"
                value="{{ $filterValues->getMaxPrice() ?: '' }}"
                placeholder=""
            />
        </x-forms.groups.filter_group>

        <div class="flex space-x-2 items-center">
            <x-forms.submit_button>
                <x-icons.search class="h-4 w-4"/>
            </x-forms.submit_button>
            <x-forms.cancel_button href="{{ route('catalog', ['slug' => $currentCategory]) }}">
                <x-icons.cancel_search class="h-4 w-4"/>
            </x-forms.cancel_button>
        </div>
    </div>
    <hr>
    <div class="flex space-x-2 items-center">
        <div class="font-bold">Сортировать по:</div>
        <x-catalog.sort_button name="order_price" currentValue="{{ $filterValues->getOrderPrice() }}">Цене</x-catalog.sort_button>
        <x-catalog.sort_button name="order_model" currentValue="{{ $filterValues->getOrderModel() }}">Модели</x-catalog.sort_button>
    </div>
</form>
