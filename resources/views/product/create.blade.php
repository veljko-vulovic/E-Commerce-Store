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
                        Create Product
                    </h3>

                    <section class="p-3 antialiased sm:p-5">
                        <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
                            <form class="space-y-4" method="POST" action="{{ route('product.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="flex space-x-3">
                                    <div class="flex flex-col items-start space-y-3">
                                        <label class="text-sm text-white" for="product-name">Product Name</label>
                                        <input
                                            class="text-white placeholder-gray-300 bg-gray-700 border border-gray-700 rounded-md"
                                            placeholder="Product Name" name="name" type="text">
                                    </div>
                                    <div class="flex flex-col items-start space-y-3">
                                        <label class="text-sm text-white" for="product-name">Product Category</label>
                                        <select
                                            class="text-white placeholder-gray-300 bg-gray-700 border border-gray-700 rounded-md"
                                            name="category_id" id="">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="product_image">Product Image</label>
                                    <input
                                        class="block w-1/3 mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="product_image" name="image" type="file">


                                </div>
                                <div class="flex items-center">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" value="1" name="featured" class="sr-only peer">
                                        <div
                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                        </div>
                                        <span
                                            class="text-sm font-medium text-gray-900 ms-3 dark:text-gray-300">Featured</span>
                                    </label>
                                </div>


                                <div class="flex flex-col items-start space-y-3">

                                    <label class="text-sm text-white" for="product-name">Product Description</label>
                                    <textarea class="text-white placeholder-gray-300 bg-gray-700 border border-gray-700 rounded-md" id=""
                                        cols="30" rows="10" name="description"></textarea>
                                </div>

                                <div class="flex flex-col items-start space-y-3">

                                    <label class="text-sm text-white" for="product-name">Product Price</label>
                                    <input
                                        class="text-white placeholder-gray-300 bg-gray-700 border border-gray-700 rounded-md"
                                        placeholder="Product price" name="price" type="number">
                                </div>


                                <div class="flex flex-col space-y-4">
                                    <div class="flex items-center space-x-4">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="on_sale" value="1" class="sr-only peer">

                                            <div
                                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                            </div>
                                            <span class="text-sm font-medium text-gray-900 ms-3 dark:text-gray-300">On
                                                Sale</span>
                                        </label>

                                        <div class="flex flex-col items-start space-y-3">
                                            <input
                                                class="px-3 py-2 text-white placeholder-gray-300 bg-gray-700 border border-gray-700 rounded-md"
                                                type="number" name="sale_percent" id="sale_percent"
                                                placeholder="Sale Precent">
                                        </div>

                                    </div>
                                </div>

                                <div class="flex flex-col items-start space-y-3">
                                    <label for="stock">Stock</label>
                                    <input
                                        class="text-white placeholder-gray-300 bg-gray-700 border border-gray-700 rounded-md"
                                        type="number" name="stock" id="stock">
                                </div>

                                <button class="px-4 py-2 bg-blue-500 rounded-md" type="submit">Create</button>
                            </form>
                        </div>

                    </section>

                </div>
            </div>
        </div>
</x-app-layout>
