@props(['product'])

<div class="p-3 text-black bg-white rounded-md ">
    <div class="flex flex-col justify-between h-full min-h-[350px]">
        <div>
            <x-product.wishlist-button :product="$product" :key="$product->id" :isWishlisted="$product->IsInWishlisted" />
            <img class="w-full rounded-md" src="{{ asset('storage/' . $product->image) }}" alt="Product image">

            <div class="px-3 ml-[-12px] w-full text-xl">
                <a href="{{ route('product.show', $product) }}">{{ $product->name }}</a>
            </div>
        </div>
        <div>

            @if ($product->on_sale)
                <div class="flex items-center justify-start my-3 sale">
                    <span class="px-3 py-1 mr-3 text-white bg-red-500 rounded">
                        -{{ $product->sale_percent }}%
                    </span>
                    <span class="text-red-500 font-small">Usteda: {{ $product->price * ($product->sale_percent / 100) }}
                        <span class="text-sm">RSD</span></span>
                </div>
            @endif
            <div class="flex items-center justify-between cart">
                <div class="flex flex-col">
                    @if ($product->on_sale)
                        <span class="text-sm font-medium text-gray-400 line-through">
                            {{ $product->price - $product->price * ($product->sale_percent / 100) }} <span
                                class="text-sm">RSD</span>
                        </span>
                    @endif
                    <span class="text-xl font-bold">{{ $product->price }} <span class="text-sm">RSD</span></span>
                </div>
                <form action="{{ route('cart.store', $product->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button class="p-3 bg-yellow-400 rounded hover:bg-yellow-300" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-black">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
