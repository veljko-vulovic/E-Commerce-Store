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
    <div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-800 dark:text-gray-200">

        <div class="max-w-md p-10 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-200">
            <h1 class="text-3xl font-semibold text-center text-green-500">Checkout Successful</h1>
            <p class="mt-4 text-xl text-center">
                {{ $customer->name }}, thank you for your order.
                <br> We will process it as soon as possible.
            </p>
        </div>
    </div>


</body>

</html>
