<section class="slider">
    <div data-slick-carousel>
        @foreach($banners as $banner)
            <div class="relative banner">
                <x-panels.homepage.banners_item :banner="$banner" />
            </div>
        @endforeach
    </div>
</section>
