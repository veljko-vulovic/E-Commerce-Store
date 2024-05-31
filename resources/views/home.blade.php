<x-app-layout>

    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <h3 class="mb-6 text-2xl font-bold"> Featured Products</h3>
        <div class="grid grid-cols-3 gap-6 sm:grid-cols-2 md:grid-cols-4">

            @foreach ($featuredProducts as $product)
                <x-product-cart :product="$product" />
            @endforeach
        </div>

    </div>

    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <h3 class="mb-6 text-2xl font-bold"> On Sale Products</h3>
        <div class="grid grid-cols-3 gap-6 sm:grid-cols-2 md:grid-cols-4">

            @foreach ($onSaleProducts as $product)
                <x-product-cart :product="$product" />
            @endforeach
        </div>

    </div>


    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <h3 class="mb-6 text-2xl font-bold"> All Products</h3>

        <div class="grid grid-cols-3 gap-6 sm:grid-cols-2 md:grid-cols-4">

            @foreach ($products as $product)
                <x-product-cart :product="$product" />
            @endforeach
        </div>

    </div>

</x-app-layout>
