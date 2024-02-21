@props(['specifications'])
@foreach($specifications as $item)
    @if($item['value'] !== null)
        <tr>
            <td class="py-2 text-gray-600 w-1/2">{{ $item['title'] }}</td>
            <td class="py-2 text-black font-bold w-1/2">{{ $item['value'] }}</td>
        </tr>
    @endif
@endforeach
