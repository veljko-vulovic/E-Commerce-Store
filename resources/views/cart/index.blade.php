<x-app-layout>
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="mb-6 text-4xl font-bold">Cart </h1>

        <div class="flex justify-between">
            <div class="space-y-4">
                @foreach ($cartItems as $item)
                    <div class="flex flex-col w-full p-4 mx-auto space-x-10 text-black bg-white rounded-md h-72">
                        <div class="flex justify-between w-full">

                            <img class="h-60" src="{{ asset('storage/' . $item->product->image) }}" alt=""
                                class="">
                            <div class="flex justify-between w-full">
                                <div class="flex flex-col justify-between space-y-4">
                                    <h3 class="text-2xl font-bold"><a
                                            href="{{ route('product.show', $item->product->id) }}">{{ $item->product->name }}</a>
                                    </h3>
                                    <div class="flex items-center">
                                        <span class="mr-3 text-md">Qty:</span>
                                        <form action="{{ route('cart.update', $item->product->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="flex items-center space-x-4">

                                                <input class="w-20" type="number" name="quantity"
                                                    id="quantity-{{ $item->product->id }}"
                                                    value="{{ $item->quantity }}">
                                                <button
                                                    class="flex items-center px-3 py-2 space-x-3 text-lg font-bold text-white bg-blue-500 rounded-full"
                                                    type="submit">
                                                    <span>Update</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-between space-y-10">
                                    <div class="flex justify-end">
                                        <span class="text-xl font-bold">
                                            {{ number_format($item->total_price, 2) }}
                                            <span class="text-sm">RSD</span></span>
                                    </div>
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="flex items-center px-3 py-2 space-x-3 text-lg font-bold text-white bg-red-500 rounded-full"
                                            type="submit"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                            <span>Remove</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="my-1 text-center">
                            <span class="text-sm text-gray-500">Max Qnt:
                                {{ $item->product->stock }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="sticky flex flex-col top-10 w-[300px] p-4 text-black bg-white rounded-md h-72">

                <h3 class="text-2xl font-bold">Checkout Summary</h3>
                <div class="flex items-center mt-4">
                    <span class="text-xl font-bold">
                        Total: {{ number_format($total, 2) }}
                        <span class="text-sm"> RSD</span></span>
                </div>


                <div class="flex justify-center mt-auto">

                    <form action="{{ route('checkout.process', $cart) }}" method="POST">
                        @csrf
                        <button {{ $cartItems->count() == 0 ? 'disabled' : '' }} type="submit"
                            class="px-4 py-3 text-lg font-bold text-white bg-red-500 rounded-full disabled:bg-red-300 disabled:cursor-not-allowed"
                            href="/checkout">Checkout</button>
                    </form>
                </div>

            </div>
        </div>

    </div>

</x-app-layout>
