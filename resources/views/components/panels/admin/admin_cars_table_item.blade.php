<tr>
    <td class="border px-4 py-2">{{ $car->id }}</td>
    <td class="border px-4 py-2">{{ $car->name }}</td>
    <td class="border px-4 py-2"><x-price :price="$car->price"/></td>
    <td class="border px-4 py-2">@isset($car->old_price)<x-price :price="$car->old_price"/>@endisset</td>
    <td class="border px-4 py-2">{{ $car->is_new ? 'Новинка' : ''}}</td>
    <x-panels.admin.admin_tables_buttons_edit href="{{ route('admin.cars.edit', $car) }} "/>
    <x-panels.admin.admin_tables_buttons_delete action="{{ route('admin.cars.destroy', $car) }}" method="post"/>
</tr>
