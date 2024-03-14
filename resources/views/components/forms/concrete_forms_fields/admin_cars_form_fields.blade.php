@props(['car'])
@csrf
<x-forms.groups.group for="fieldCarName" error="{{ $errors->first('name') }}">
    <x-slot:label>Название модели</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarName"
        placeholder="Stinger"
        name="name"
        value="{{ old('name', $car->name) }}"
        error="{{ $errors->first('name') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarMainImage" error="{{ $errors->first('image') }}">
    <x-slot:label>Основное изображение модели</x-slot:label>
    <x-forms.inputs.one_file
        id="fieldCarMainImage"
        name="image"
        value="{{ $car->imageUrl }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarPrice" error="{{ $errors->first('price') }}">
    <x-slot:label>Цена с учетом скидки</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarPrice"
        placeholder="1000000"
        name="price"
        value="{{ old('price', $car->price) }}"
        error="{{ $errors->first('price') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarOldPrice" error="{{ $errors->first('old_price') }}">
    <x-slot:label>Цена без скидки</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarOldPrice"
        placeholder="1000001"
        name="old_price"
        value="{{ old('old_price', $car->old_price) }}"
        error="{{ $errors->first('old_price') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarCategories" error="{{ $errors->first('categories') }}">
    <x-slot:label>Категории</x-slot:label>
    <x-forms.inputs.select
        id="fieldCarCategories"
        name="categories[]"
        error="{{ $errors->first('categories') }}"
        multiple
    >
        @foreach ($categories as $category)
            <option @selected(in_array($category->id, old('categories', $car->categories->pluck('id')->all())))
                    value="{{ $category->id }}">{{$category->name }}
            </option>
        @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarDescription" error="{{ $errors->first('description') }}">
    <x-slot:label>Описание модели</x-slot:label>
    <x-forms.inputs.textarea
        id="fieldCarDescription"
        name="description"
        value="{{ old('description', $car->description) }}"
        error="{{ $errors->first('description') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarSalon" error="{{ $errors->first('salon') }}">
    <x-slot:label>Салон</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarSalon"
        name="salon"
        placeholder="Натуральная кожа"
        value="{{ old('salon', $car->salon) }}"
        error="{{ $errors->first('salon') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarKPP" error="{{ $errors->first('kpp') }}">
    <x-slot:label>КПП</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarKPP"
        name="kpp"
        placeholder="Автомат, 6 AT"
        value="{{ old('kpp', $car->kpp) }}"
        error="{{ $errors->first('kpp') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarYear" error="{{ $errors->first('year') }}">
    <x-slot:label>Год выпуска</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarYear"
        name="year"
        placeholder="2024"
        value="{{ old('year', $car->year) }}"
        error="{{ $errors->first('year') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarColor" error="{{ $errors->first('color') }}">
    <x-slot:label>Цвет</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarColor"
        name="color"
        placeholder="Чёрный"
        value="{{ old('color', $car->color) }}"
        error="{{ $errors->first('color') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarClass" error="{{ $errors->first('car_class_id') }}">
    <x-slot:label>Класс</x-slot:label>
    <select
        id="fieldCarClass"
        name="car_class_id"
        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    >
        @foreach($carClasses as $class)
            <option @selected($class->id == old('car_class_id', $car->car_class_id)) value="{{ $class->id }}">
                {{ $class->name }}
            </option>
        @endforeach
    </select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarBody" error="{{ $errors->first('car_body_id') }}">
    <x-slot:label>Кузов</x-slot:label>
    <select
        id="fieldCarBody"
        name="car_body_id"
        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    >
        @foreach($carBodies as $body)
            <option @selected($body->id == old('car_body_id', $car->car_body_id)) value="{{ $body->id }}">
                {{ $body->name }}
            </option>
        @endforeach
    </select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarEngine" error="{{ $errors->first('car_engine_id') }}">
    <x-slot:label>Двигатель</x-slot:label>
    <select
        id="fieldCarEngine"
        name="car_engine_id"
        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    >
        @foreach($carEngines as $engine)
            <option @selected($engine->id == old('car_class_id', $car->car_engine_id)) value="{{ $engine->id }}">
                {{ $engine->name }}
            </option>
        @endforeach
    </select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarAdditionalImages" error="{{ $errors->first('images') }}">
    <x-slot:label>Дополнительные изображения модели</x-slot:label>
    <x-forms.inputs.multiple_files
        id="fieldCarAdditionalImages"
        name="images"
        :values="$car->images->pluck('url')->all()"
    />
</x-forms.groups.group>

<x-forms.groups.checkbox_group>
    <x-slot:label>Новинка</x-slot:label>
    <x-forms.inputs.checkbox
        name="is_new"
        :checked="old('is_new', $car->is_new)"
    />
</x-forms.groups.checkbox_group>

<x-forms.groups.group for="fieldCarTags" error="{{ $errors->first('tags') }}">
    <x-slot:label>Теги</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarTags"
        name="tags"
        placeholder="Парадигма, Архетип, Киа Seed"
        value="{{ old('tags', $car->tags->pluck('name')->implode(', ')) }}"
        error="{{ $errors->first('tags') }}"
    />
</x-forms.groups.group>
