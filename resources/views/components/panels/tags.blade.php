<table class="w-full">
    <tr>
        <td class="py-2 text-gray-600 w-1/2">Теги:</td>
        <td class="py-2 text-black font-bold w-1/2">
            @props(['tags'])
            @if($tags->isNotEmpty())
                <div>
                    @foreach($tags as $tag)
                        <span class="text-sm text-white italic rounded bg-orange px-2">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
        </td>
    </tr>
</table>
