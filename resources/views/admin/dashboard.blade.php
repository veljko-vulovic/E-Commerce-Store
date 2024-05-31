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

                    <div class="flex">
                        <div class="p-4 mx-auto mt-10">
                            {{-- <img src="https://source.unsplash.com/random/1920x320" alt=""> --}}
                        </div>
                    </div>


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
                        <div class="grid grid-cols-6 px-2 py-3">

                            <div class="p-4">
                                <p class="text-center">1234</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Pera Peric</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Samsung Galaxy S10+</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">$999</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">25-May-2024</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Delivered</p>
                            </div>

                        </div>
                        <div class="grid grid-cols-6 px-2 py-3">

                            <div class="p-4">
                                <p class="text-center">1234</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Pera Peric</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Samsung Galaxy S10+</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">$999</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">25-May-2024</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Delivered</p>
                            </div>

                        </div>
                        <div class="grid grid-cols-6 px-2 py-3">

                            <div class="p-4">
                                <p class="text-center">1234</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Pera Peric</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Samsung Galaxy S10+</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">$999</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">25-May-2024</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Delivered</p>
                            </div>

                        </div>
                        <div class="grid grid-cols-6 px-2 py-3">

                            <div class="p-4">
                                <p class="text-center">1234</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Pera Peric</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Samsung Galaxy S10+</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">$999</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">25-May-2024</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Delivered</p>
                            </div>

                        </div>
                        <div class="grid grid-cols-6 px-2 py-3">

                            <div class="p-4">
                                <p class="text-center">1234</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Pera Peric</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Samsung Galaxy S10+</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">$999</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">25-May-2024</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Delivered</p>
                            </div>

                        </div>
                        <div class="grid grid-cols-6 px-2 py-3">

                            <div class="p-4">
                                <p class="text-center">1234</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Pera Peric</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Samsung Galaxy S10+</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">$999</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">25-May-2024</p>
                            </div>
                            <div class="p-4">
                                <p class="text-center">Delivered</p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
</x-app-layout>
