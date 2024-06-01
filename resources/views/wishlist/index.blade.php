<x-app-layout>
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="mb-6 text-4xl font-bold">Whishlist </h1>
        <div class="grid grid-cols-3 gap-6 sm:grid-cols-2 md:grid-cols-4">
            @foreach ($wishlists as $product)
                <x-product-cart :product="$product" />
            @endforeach
        </div>

    </div>
</x-app-layout>
