<x-app-layout>


    <div class="flex justify-between gap-4 mx-auto mt-12 max-w-7xl">

        <div>
            <img src="{{ $product->image }}" alt="">

        </div>
        <div class="flex flex-col space-y-4">
            <h3>{{ $product->name }}</h3>
            @if ($product->on_sale)
                <div class="flex items-center justify-start my-3 sale">
                    <span class="px-3 py-1 mr-3 text-white bg-red-500 rounded">
                        -{{ $product->sale_percent }}%
                    </span>
                    <span class="text-red-500 font-small">Usteda: {{ $product->price * ($product->sale_percent / 100) }}
                        <span class="text-sm">RSD</span></span>
                </div>
                <span class="text-sm font-medium text-gray-400 line-through">
                    {{ $product->price - $product->price * ($product->sale_percent / 100) }} <span
                        class="text-sm">RSD</span>
                </span>
            @endif
            <span class="text-xl font-bold">{{ $product->price }} <span class="text-sm">RSD</span></span>


            {{-- <form action="{{ route('cart.store', $product) }}"> --}}
            <form action="">
                <x-primary-button class="mt-4">Add to cart</x-primary-button>
            </form>

            <p>
                {{ $product->description }}
            </p>

        </div>
    </div>
</x-app-layout>
