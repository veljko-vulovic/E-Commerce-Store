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

                    <h3 class="text-3xl font-bold">
                        Orders
                    </h3>

                    <!-- Start block -->
                    <section class="p-3 antialiased sm:p-5">
                        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-900 sm:rounded-lg">
                                <div
                                    class="flex flex-col p-4 space-y-3 md:flex-row md:items-center md:justify-between md:space-y-0 md:space-x-4">
                                    <div class="flex items-center flex-1 space-x-2">
                                        <h5>
                                            <span class="text-gray-500">All Orders:</span>
                                            <span class="dark:text-white">
                                                {{ $orders->total() }}
                                            </span>
                                        </h5>

                                    </div>
                                </div>
                                <div
                                    class="flex flex-col items-stretch justify-between py-4 mx-4 space-y-3 border-t md:flex-row md:items-center md:space-x-3 md:space-y-0 dark:border-gray-700">
                                    <div class="w-full md:w-1/3">
                                        <form class="flex items-center">
                                            <label for="simple-search" class="sr-only">Search</label>
                                            <div class="relative w-full">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewbox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                                    </svg>
                                                </div>
                                                <input type="text" id="simple-search" placeholder="Search for order"
                                                    required=""
                                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>

                                                <th scope="col" class="p-4">Order ID</th>
                                                <th scope="col" class="p-4">User Name</th>
                                                <th scope="col" class="p-4">Product</th>
                                                <th scope="col" class="p-4">Total Price</th>
                                                <th scope="col" class="p-4">Date</th>
                                                <th scope="col" class="p-4">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($orders as $order)
                                                <tr
                                                    class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">

                                                    <th scope="row"
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center mr-3">
                                                            {{ $order->id }}
                                                        </div>
                                                    </th>

                                                    <td
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center">

                                                            {{ $order->user->name }}
                                                        </div>
                                                    </td>

                                                    <td
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex flex-col space-y-2">
                                                            @foreach ($order->products() as $orderProduct)
                                                                <div class="flex items-center gap-4 ">
                                                                    <img src="{{ asset('storage/' . $orderProduct->image) }}"
                                                                        alt="" class="w-5 h-5">
                                                                    <a href="{{ route('product.show', $orderProduct->id) }}"
                                                                        class="text-sm hover:text-blue-500 hover:underline">{{ $orderProduct->name }}</a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>

                                                    <td
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center">
                                                            <span class="text-sm font-medium text-white">
                                                                {{ $order->total_amount }} <span
                                                                    class="text-sm">RSD</span>
                                                            </span>
                                                        </div>
                                                    </td>

                                                    <td
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center">
                                                            {{ date_format($order->updated_at, 'd-M-Y') }}
                                                        </div>
                                                    </td>

                                                    <td
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center">
                                                            <div x-data="{ status: '{{ $order->status }}' }"
                                                                class="inline-block w-4 h-4 mr-2 rounded-full"
                                                                :class="{
                                                                    'bg-green-500': status === 'confirmed',
                                                                    'bg-yellow-500': status === 'pending',
                                                                    'bg-red-500': status === 'canceled',
                                                                }">
                                                            </div>
                                                            <a
                                                                href="{{ route('checkout.success') . '?session_id=' . $order->stripe_id }}">{{ $order->status }}</a>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-4">
                                    {{ $orders->links() }}
                                </div>

                            </div>
                        </div>
                    </section>
                    <!-- End block -->

                </div>
            </div>
        </div>
</x-app-layout>
