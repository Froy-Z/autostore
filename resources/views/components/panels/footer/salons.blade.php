<div>
    <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
    <span class="inline-block pl-1"> / <a href="/salons" class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
</div>

<div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
    @props(['salons'])
    @if($salons->isEmpty())
        <p class="p-4 italic text-xl">Сервис временно недоступен</p>
    @else
        @foreach($salons as $salon)
            <div class="w-full flex">
                <x-panels.footer.salons_item :salon="$salon"/>
            </div>
        @endforeach
    @endif
</div>
