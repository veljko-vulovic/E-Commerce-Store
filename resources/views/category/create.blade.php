<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div
                class="grid grid-cols-12 gap-4 overflow-hidden text-gray-900 shadow-sm sm:rounded-lg dark:text-gray-100">

                @include('admin.partials.sidebar')

                <div class="col-span-10 p-10 bg-gray-800 rounded-md">

                    <h3 class="text-3xl font-bold">
                        Create Category
                    </h3>

                    <section class="p-3 antialiased sm:p-5">
                        <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
                            <form class="space-y-4" method="POST" action="{{ route('category.store') }}">
                                @csrf

                                <div class="flex space-x-3">
                                    <div class="flex flex-col items-start space-y-3">
                                        <label class="text-sm text-white" for="category-name">Category Name</label>
                                        <input
                                            class="text-white placeholder-gray-300 bg-gray-700 border border-gray-700 rounded-md"
                                            placeholder="Category Name" name="name" type="text">
                                    </div>
                                    <div class="flex flex-col justify-end space-y-3">
                                        <button class="px-3 py-2 bg-blue-500 rounded-md" type="submit">Create</button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </section>

                </div>
            </div>
        </div>
</x-app-layout>
