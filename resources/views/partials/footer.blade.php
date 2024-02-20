<footer class="container mx-auto">
    @isset($footerNavigation)
        {{ $footerNavigation }}
    @else
        <section class="block sm:flex bg-white p-4">
            <div class="flex-1">
                <x-panels.footer.salons />
            </div>
            <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
                <p class="text-3xl text-black font-bold mb-4">{{ __('Information') }}</p>
                <x-information_menu template="footer" />
            </div>
        </section>
    @endisset
    <x-panels.footer.copyrights />
</footer>
