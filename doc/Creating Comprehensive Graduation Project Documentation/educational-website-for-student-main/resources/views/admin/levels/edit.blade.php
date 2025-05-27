<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Edit Level
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-100 p-4 rounded-lg shadow">
                    <ul class="list-disc pl-6">
                        @foreach ($errors->all() as $error)
                            <li class="mb-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('admin.levels.update', $level) }}" method="POST"
                  class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 space-y-6">
                @csrf
                @method('PUT')

                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">📝 Edit Level Information</h3>

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Level Name
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $level->name) }}"
                           class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Description
                    </label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">{{ old('description', $level->description) }}</textarea>
                </div>

                {{-- Min Age --}}
                <div>
                    <label for="min_age" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Minimum Age
                    </label>
                    <input type="number" name="min_age" id="min_age" min="0" max="100"
                           value="{{ old('min_age', $level->min_age) }}"
                           class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                </div>

                {{-- Max Age --}}
                <div>
                    <label for="max_age" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Maximum Age
                    </label>
                    <input type="number" name="max_age" id="max_age" min="0" max="100"
                           value="{{ old('max_age', $level->max_age) }}"
                           class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                </div>

                {{-- Order --}}
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Display Order
                    </label>
                    <input type="number" name="order" id="order" min="0"
                           value="{{ old('order', $level->order) }}"
                           class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                </div>

                {{-- Submit --}}
                <div class="flex justify-end mt-6">
                    <a href="{{ route('admin.levels.index') }}"
                       class="mr-4 inline-block text-sm text-gray-600 dark:text-gray-300 hover:underline">
                        Cancel
                    </a>
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow">
                        Update Level
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
