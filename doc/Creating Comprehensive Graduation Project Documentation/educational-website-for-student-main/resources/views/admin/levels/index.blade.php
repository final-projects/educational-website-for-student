<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            All Levels
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100 p-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">📚 Levels List</h3>
                    <a href="{{ route('admin.levels.create') }}"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow">
                        + Add Level
                    </a>
                </div>

                @if ($levels->isEmpty())
                    <p class="text-gray-500 dark:text-gray-300">No levels found.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse text-sm">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                    <th class="px-4 py-2 text-left">#</th>
                                    <th class="px-4 py-2 text-left">Name</th>
                                    <th class="px-4 py-2 text-left">Description</th>
                                    <th class="px-4 py-2 text-left">Min Age</th>
                                    <th class="px-4 py-2 text-left">Max Age</th>
                                    <th class="px-4 py-2 text-left">Order</th>
                                    <th class="px-4 py-2 text-left">Created At</th>
                                    <th class="px-4 py-2 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $index => $level)
                                    <tr
                                        class="border-b dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <td class="px-4 py-2 dark:text-white">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2 dark:text-white">{{ $level->name }}</td>
                                        <td class="px-4 py-2 dark:text-white">{{ $level->description ?? '—' }}</td>
                                        <td class="px-4 py-2 dark:text-white">{{ $level->min_age ?? '—' }}</td>
                                        <td class="px-4 py-2 dark:text-white">{{ $level->max_age ?? '—' }}</td>
                                        <td class="px-4 py-2 dark:text-white">{{ $level->order ?? '—' }}</td>
                                        <td class="px-4 py-2 dark:text-white">{{ $level->created_at->format('Y-m-d') }}
                                        </td>
                                        <td class="px-4 py-2 text-right space-x-2">
                                            <a href="{{ route('admin.levels.show', $level) }}"
                                                class="text-sm text-blue-600 dark:text-blue-400 hover:underline">View</a>
                                            <a href="{{ route('admin.levels.edit', $level) }}"
                                                class="text-sm text-yellow-600 dark:text-yellow-400 hover:underline">Edit</a>
                                            <form action="{{ route('admin.levels.destroy', $level) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this level?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-sm text-red-600 dark:text-red-400 hover:underline">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-admin-layout>
