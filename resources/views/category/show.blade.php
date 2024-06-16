<x-app-layout>

    <section class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <x-slider.category-slider title='Kategorije' />
    </section>


    <section class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <h3 class="mb-6 text-2xl font-bold">{{ $cat->name }} Products</h3>
        <div class="grid grid-cols-3 gap-6 sm:grid-cols-2 md:grid-cols-4">

            @foreach ($catProduct as $product)
                <x-product-cart :product="$product" />
            @endforeach
        </div>

    </section>

</x-app-layout>
