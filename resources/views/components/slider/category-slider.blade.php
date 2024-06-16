@props(['title' => 'Najtraženije kategorije'])
<div>
    <div class="pb-9 swiper mySwiper">
        <h3 class="my-4 text-2xl font-bold">{{ $title }} </h3>
        <div class="swiper-wrapper">

            @foreach ($categories as $cat)
                <div class="swiper-slide">
                    <a href="{{ route('category.show', $cat->slug) }}">

                        <div class="flex flex-col items-center p-4 text-center bg-white border rounded-md">
                            {{-- <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div> --}}
                            {{-- <img class="relative object-cover w-full rounded-md " loading="lazy"
                            src="https://picsum.photos/id/1/50" alt=""> --}}
                            <span class="text-2xl font-black text-gray-800">{{ $cat->name }}</span>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        <div class="mt-10 swiper-pagination"></div>
    </div>


    <style>
        :root {
            --swiper-pagination-bullet-inactive-opacity: 1;
            --swiper-pagination-color: var(--swiper-theme-color);
            --swiper-pagination-bullet-inactive-color: #ffffff;

        }
    </style>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 6,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
</div>
