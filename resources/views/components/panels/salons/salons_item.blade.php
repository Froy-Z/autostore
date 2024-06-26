<div {{ $class }}>
    <div href="/salons" class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
        <img src="{{ $salon->image }}" class="w-full h-full object-cover" alt="">
    </div>
    <div class="px-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            <div class="text-black font-bold text-xl mb-2">{{ $salon->name }}</div>
            <div class="text-base space-y-2">
                <p class="text-gray-400">{{ $salon->address }}</p>
                <p class="text-black">{{ $salon->phone }}</p>
                <p class="text-sm">Часы работы:<br> {{ $salon->workHours }}</p>
            </div>
        </div>
    </div>
</div>
