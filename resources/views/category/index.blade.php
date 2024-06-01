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
                        Categories
                    </h3>

                    <!-- Start block -->
                    <section class="p-3 antialiased sm:p-5">
                        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-900 sm:rounded-lg">
                                <div
                                    class="flex flex-col p-4 space-y-3 md:flex-row md:items-center md:justify-between md:space-y-0 md:space-x-4">
                                    <div class="flex items-center flex-1 space-x-2">
                                        <h5>
                                            <span class="text-gray-500">All Categories:</span>
                                            <span class="dark:text-white">{{ $categories->total() }}</span>
                                        </h5>

                                    </div>
                                </div>
                                <div
                                    class="flex flex-col items-stretch justify-between py-4 mx-4 space-y-3 border-t md:flex-row md:items-center md:space-x-3 md:space-y-0 dark:border-gray-700">
                                    <div class="w-full md:w-1/2">
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
                                                <input type="text" id="simple-search"
                                                    placeholder="Search for categories" required=""
                                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </form>
                                    </div>
                                    <div
                                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                        <a href="{{ route('category.create') }}" id="createCategoryButton"
                                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                            </svg>
                                            Add category
                                        </a>

                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>

                                                <th scope="col" class="p-4">Category</th>
                                                <th scope="col" class="p-4">Number of products</th>
                                                <th scope="col" class="p-4">Last Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($categories as $category)
                                                <tr
                                                    class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">

                                                    <th scope="row"
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center mr-3">
                                                            {{ $category->name }}
                                                        </div>
                                                    </th>

                                                    <td
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center">
                                                            {{-- <div
                                                                class="inline-block w-4 h-4 mr-2 bg-green-500 rounded-full">
                                                            </div> --}}
                                                            {{ $category->products->count() }}
                                                        </div>
                                                    </td>

                                                    <td
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center space-x-4">
                                                            <a href="{{ route('category.edit', $category->id) }}"
                                                                class="flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path
                                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                                Edit
                                                            </a>
                                                            <a href="{{ route('category.show', $category->slug) }}"
                                                                class="flex items-center px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewbox="0 0 24 24" fill="currentColor"
                                                                    class="w-4 h-4 mr-2 -ml-0.5">
                                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                                </svg>
                                                                Preview
                                                            </a>

                                                            <form
                                                                action="{{ route('category.destroy', $category->id) }} "
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="flex items-center px-3 py-2 text-sm font-medium text-center text-red-700 border border-red-700 rounded-lg hover:text-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                                                                        fill="currentColor" aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-4">{{ $categories->links() }}</div>

                            </div>
                        </div>
                    </section>
                    <!-- End block -->

                </div>
            </div>
        </div>
</x-app-layout>
