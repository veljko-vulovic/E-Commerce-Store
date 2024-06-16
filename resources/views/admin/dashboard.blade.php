<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div
                class="grid grid-cols-12 gap-4 overflow-hidden text-gray-900 shadow-sm sm:rounded-lg dark:text-gray-100">

                @include('admin.partials.sidebar')

                <div class="col-span-10 p-10 bg-gray-800 rounded-md">

                    <div class="flex items-center justify-center">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7">

                            @for ($i = 0; $i < 4; $i++)
                                <x-dashboard.info-card />
                            @endfor

                        </div>
                    </div>

                    {{-- <div class="flex">
                        <div class="p-4 mx-auto mt-10">

                        </div>
                    </div> --}}


                    <div class="flex flex-col mt-10 text-white bg-[#24303f] rounded-md">
                        <h3 class="m-4 text-3xl font-bold">Orders</h3>

                        <div class="grid grid-cols-6 bg-[#3b4f68] py-3 px-2">

                            <div class="p-4">
                                <p class="text-center uppercase">Order ID</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center uppercase">User Name</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center uppercase">Product</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center uppercase">Total Price</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center uppercase">Date</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center uppercase">Status</p>
                            </div>

                        </div>


                        @foreach ($orders as $order)
                            <div class="grid grid-cols-6 px-2 py-3">

                                <div class="p-4">
                                    <p class="text-center">{{ $order->id }}</p>
                                </div>
                                <div class="p-4">
                                    <p class="text-center">{{ $order->user->name }}</p>
                                </div>
                                <div class="p-4">
                                    <p class="flex flex-col text-center">
                                        @foreach ($order->products() as $orderProduct)
                                            <a href="{{ route('product.show', $orderProduct->id) }}"
                                                class="text-sm hover:text-blue-500 hover:underline">{{ $orderProduct->name }}</a>
                                        @endforeach
                                    </p>
                                </div>
                                <div class="p-4">
                                    <p class="text-center">{{ $order->total_amount }} RSD</p>
                                </div>
                                <div class="p-4">
                                    <p class="text-center">{{ date_format($order->updated_at, 'd-M-Y') }}</p>
                                </div>
                                <div class="p-4">
                                    <p class="text-center">{{ $order->status }}</p>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
