@php($count = 1)
<div class="space-y-4 max-w-4xl">
    @if($salons->isEmpty())
        <p class="p-4 italic text-xl">Сервис временно недоступен</p>
    @else
        @foreach($salons as $salon)
            @if($count % 2 !== 0)
                <div class="w-full flex p-4">
                    <x-panels.salons.salon_image :salon="$salon" />
                    <x-panels.salons.salon_content :salon="$salon" />
                </div>
            @else
                <div class="w-full flex justify-end bg-gray-100 p-4">
                    <x-panels.salons.salon_content :salon="$salon" class="text-right" />
                    <x-panels.salons.salon_image :salon="$salon"/>
                </div>
            @endif
            @php($count++)
        @endforeach
    @endif
</div>
