<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased ">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-800 dark:text-gray-200">

        <div class="bg-gray-900">
            <div class="flex items-center justify-between h-24 px-4 mx-auto max-w-7xl">
                <h3 class="text-2xl font-bold">E-Commerce Store</h3>
                <div class="flex items-center bg-red-600 rounded-md">
                    <input type="text"
                        class="border-none shadow-sm w-80 rounded-l-md dark:text-gray-300 focus:border-none focus:ring-transparent"
                        placeholder="Search Product..." ref="input" />
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6 mx-5 ">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="flex flex-col items-center w-24 px-4 py-2 border border-gray-200 rounded-md h-14">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        <div>
                            <h3 class="text-xs">Login</h3>
                        </div>
                    </div>
                    <div class="flex flex-col items-center w-24 px-4 py-2 border border-gray-200 rounded-md h-14">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        <span class="text-xs">Wishlist</span>
                    </div>
                    <div class="flex flex-col items-center w-24 px-4 py-2 border border-gray-200 rounded-md h-14">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-xs">Cart</span>
                    </div>
                </div>
            </div>

            <nav class="h-12 bg-gray-700">
                <div class="flex items-center h-full mx-auto max-w-7xl">
                    <div class="flex items-center ml-4 space-x-5">
                        <a class="flex items-center" href="/">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </a>
                        <a href="#">Categories..</a>
                        <a href="#">Categories..</a>
                        <a href="#">Categories..</a>
                        <a href="#">Categories..</a>
                    </div>
                </div>
            </nav>
        </div>

        <main class="pt-4 space-y-4">

            <section class="flex gap-4 mx-auto max-w-7xl">
                <div class="relative w-1/2 max-w-6xl mx-auto border rounded-md">
                    <img class="object-cover w-full rounded-md"
                        src="https://source.unsplash.com/random/630x360?sig={{ rand(1, 1000) }}" alt="">
                    <a class="absolute px-4 py-2 font-bold text-black bg-yellow-500 rounded-full bottom-4 right-4 text-md"
                        href="#">Lorem
                        ipsum</a>
                </div>
                <div class="relative w-1/2 max-w-6xl mx-auto border rounded-md">
                    <img class="object-cover w-full rounded-md"
                        src="https://source.unsplash.com/random/630x360?sig={{ rand(1, 1000) }}" alt="">
                    <a class="absolute px-4 py-2 font-bold text-black bg-yellow-500 rounded-full bottom-4 right-4 text-md"
                        href="#">Lorem
                        ipsum</a>
                </div>
            </section>

            <section class="flex gap-4 mx-auto max-w-7xl">

                <!-- Swiper -->
                <div class="h-64 swiper mySwiper">
                    <h3 class="my-4 text-2xl font-bold">Najtraženije kategorije </h3>
                    <div class="swiper-wrapper">

                        @for ($i = 0; $i < 12; $i++)
                            <a href="#" class="inline-block swiper-slide">
                                <div class="flex flex-col items-center p-4 text-center bg-white border rounded-md">
                                    {{-- <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div> --}}
                                    <img class="object-cover w-full rounded-md" loading="lazy"
                                        src="https://source.unsplash.com/random/220x100?sig={{ rand(1, 1000) }}"
                                        alt="">
                                    <span class="mt-4 text-2xl font-black text-gray-800">Brand</span>
                                </div>
                            </a>
                        @endfor


                    </div>
                    <div class="mt-10 swiper-pagination"></div>
                </div>

            </section>

            <section class="flex flex-col gap-4 mx-auto max-w-7xl">
                <h3 class="block my-4 text-2xl font-bold">Specijalni popusti i akcije </h3>
                <div class="grid grid-cols-3 gap-6 sm:grid-cols-2 md:grid-cols-4">
                    @for ($i = 0; $i < 8; $i++)
                        <div class="p-3 overflow-hidden text-black bg-white rounded-md">
                            <div class="flex justify-end mb-3">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </a>

                            </div>
                            <img class="w-full rounded-md"
                                src="https://source.unsplash.com/random/150x100?sig={{ rand(1, 1000) }}"
                                alt="Product image">
                            <div class="px-3 ml-[-12px] w-full text-xl">
                                Lorem, ipsum dolor.
                            </div>
                            <div class="flex items-center justify-start my-3">
                                <span class="px-3 py-1 mr-3 text-white bg-red-500 rounded">-24%</span>
                                <span class="text-red-500 font-small">Usteda: 5,000 <span
                                        class="text-sm">RSD</span></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="text-sm font-medium text-gray-400 line-through">
                                        20,000 <span class="text-sm">RSD</span>
                                    </span>
                                    <span class="text-xl font-bold">15,000 <span class="text-sm">RSD</span></span>
                                </div>
                                <div class="p-3 bg-yellow-400 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-black">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

            </section>

            <section class="flex items-center justify-around h-64 gap-4 p-3 mx-auto bg-black rounded-lg max-w-7xl">
                <div class="flex items-center justify-center w-4/5 gap-20">

                    <div>
                        <h3 class="text-3xl font-bold text-red-500">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div>

                    <img class="" src="https://source.unsplash.com/random/200x150?sig={{ rand(1, 1000) }}"
                        alt="Product image">
                </div>

                <a class="px-4 py-2 font-bold text-black bg-yellow-500 rounded-full text-md" href="#">
                    Learn more
                </a>
            </section>

            <section class="flex gap-4 mx-auto max-w-7xl">
                <div class="relative w-2/5 max-w-6xl mx-auto rounded-md">
                    <img class="object-cover w-full rounded-md"
                        src="https://source.unsplash.com/random/700x940?sig={{ rand(1, 1000) }}" alt="">
                    <a class="absolute px-4 py-2 font-bold text-black bg-yellow-500 rounded-full bottom-10 right-[40%] text-md"
                        href="#">View More</a>
                </div>
                <div class="relative max-w-6xl mx-auto">
                    <div class="grid grid-cols-3 gap-6">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="p-3 overflow-hidden text-black bg-white rounded-md">
                                <div class="flex justify-end mb-3">
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                    </a>

                                </div>
                                <img class="w-full rounded-md"
                                    src="https://source.unsplash.com/random/150x100?sig={{ rand(1, 1000) }}"
                                    alt="Product image">
                                <div class="px-3 ml-[-12px] w-full text-xl">
                                    Lorem, ipsum dolor.
                                </div>
                                <div class="flex items-center justify-start my-3">
                                    <span class="px-3 py-1 mr-3 text-white bg-red-500 rounded">-24%</span>
                                    <span class="text-red-500 font-small">Usteda: 5,000 <span
                                            class="text-sm">RSD</span></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-400 line-through">
                                            20,000 <span class="text-sm">RSD</span>
                                        </span>
                                        <span class="text-xl font-bold">15,000 <span class="text-sm">RSD</span></span>
                                    </div>
                                    <div class="p-3 bg-yellow-400 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-black">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </section>

            <section class="gap-4 mx-auto max-w-7xl">
                <div class="swiper ctaSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="relative mx-auto rounded-md">
                                <img class="object-cover w-full rounded-md"
                                    src="https://source.unsplash.com/random/1920x300?sig={{ rand(1, 1000) }}"
                                    alt="">
                                <a class="absolute px-4 py-2 font-bold text-black bg-yellow-500 rounded-full bottom-[40%] right-4 text-md"
                                    href="#">View More</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="relative mx-auto border rounded-md">
                                <img class="object-cover w-full rounded-md"
                                    src="https://source.unsplash.com/random/1920x300?sig={{ rand(1, 1000) }}"
                                    alt="">
                                <a class="absolute px-4 py-2 font-bold text-black bg-yellow-500 rounded-full bottom-[40%] right-4 text-md"
                                    href="#">View More</a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <section class="mx-auto text-black bg-white rounded-md max-w-7xl">
                <div class="grid grid-cols-4 py-4">

                    @for ($i = 0; $i < 4; $i++)
                        <div class="flex flex-col justify-center px-4 space-y-4 text-center border-collapse border-x">
                            <img class="w-auto h-24 mx-auto"
                                src="https://source.unsplash.com/random/150x100?sig={{ rand(1, 1000) }}"
                                alt="img">
                            <h3 class="text-xl font-bold">Lorem, ipsum dolor.</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                                sed enim nisi culpa eveniet id iure dolorem.</p>

                            <a class="px-5 py-2 font-bold text-black bg-yellow-500 rounded-lg text-md"
                                href="#">View More -></a>
                        </div>
                    @endfor
                </div>

            </section>

            <footer class="bg-white dark:bg-gray-900">

                <div
                    class="flex items-center w-full max-w-screen-xl gap-4 p-4 mx-auto bg-white rounded-md dark:bg-gray-900">

                    <div class="w-1/3">
                        <img class="object-cover"
                            src="https://source.unsplash.com/random/150x100?sig={{ rand(1, 1000) }}" alt="">
                    </div>

                    <div class="w-2/3">
                        <h3 class="text-2xl font-bold">Lorem ipsum dolor sit, amet adipisicing elit. Debitis,
                            cum.</h3>
                        <p class="text-lg">Lorem dolor amet consectetur adipisicing elit. Debitis, cum.</p>
                    </div>

                    <div class="w-1/3">
                        <input placeholder="Enter Email" type="text" class="w-full rounded-full">
                        <div class="flex items-center mt-3">
                            <input type="checkbox" name="policy" id="policy">
                            <p class="ml-2 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-screen-xl mx-auto">
                    <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h2>
                            <ul class="font-medium text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class=" hover:underline">About</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Careers</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Brand Center</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Blog</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Help center
                            </h2>
                            <ul class="font-medium text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Discord Server</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Twitter</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Facebook</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                            <ul class="font-medium text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Privacy Policy</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Licensing</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Download
                            </h2>
                            <ul class="font-medium text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">iOS</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Android</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Windows</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">MacOS</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </footer>


        </main>
    </div>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 6,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
        var swiper = new Swiper(".ctaSwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
</body>

</html>
