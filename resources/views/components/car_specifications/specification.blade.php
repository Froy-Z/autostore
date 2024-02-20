@props(['specifications', 'car'])
@foreach($specifications as $item)
    @if(isset($car[$item['character']]) && $car[$item['character']] !== null)
        <tr>
            <td class="py-2 text-gray-600 w-1/2">{{ $item['title'] }}</td>
            <td class="py-2 text-black font-bold w-1/2">{{ $car[$item['character']] }}</td>
        </tr>
    @endif
@endforeach
