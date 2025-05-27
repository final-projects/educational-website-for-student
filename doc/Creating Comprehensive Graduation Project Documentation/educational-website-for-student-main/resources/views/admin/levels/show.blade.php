<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Level Details
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 space-y-4">

                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">📘 {{ $level->name }}</h3>

                <div class="text-gray-700 dark:text-gray-200">
                    <p><strong>Description:</strong> {{ $level->description ?? '—' }}</p>
                    <p><strong>Minimum Age:</strong> {{ $level->min_age ?? '—' }}</p>
                    <p><strong>Maximum Age:</strong> {{ $level->max_age ?? '—' }}</p>
                    <p><strong>Order:</strong> {{ $level->order ?? '—' }}</p>
                    <p><strong>Created At:</strong> {{ $level->created_at->format('Y-m-d') }}</p>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('admin.levels.edit', $level) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md shadow">
                        Edit
                    </a>
                    <a href="{{ route('admin.levels.index') }}"
                       class="ml-3 text-sm text-gray-600 dark:text-gray-300 hover:underline">
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
