<div class="px-4 flex flex-col justify-between leading-normal {{ $attributes->get('class') }}">
    <div class="mb-8">
        <div class="text-black font-bold text-xl mb-2">{{ $salon->name }}</div>
        <div class="text-base space-y-2">
            <p class="text-gray-400">{{ $salon->address }}</p>
            <p class="text-black">{{ $salon->phone }}</p>
            <p class="text-sm">Часы работы:<br> {{ $salon->workHours }}</p>
        </div>
    </div>
</div>
