<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Courses Management
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100 p-4 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Add New Course --}}
            <div class="flex justify-end">
                <a href="{{ route('admin.courses.create') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg shadow">
                    + Add New Course
                </a>
            </div>

            {{-- Courses Table --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-4 overflow-x-auto">
                    <table class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                <th class="px-4 py-3 text-left">Title</th>
                                <th class="px-4 py-3 text-left">Level</th>
                                <th class="px-4 py-3 text-left">Created At</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $course)
                                <tr class="border-b dark:border-gray-600  hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-4 py-3 dark:text-white ">{{ $course->title }}</td>
                                    <td class="px-4 py-3 dark:text-white ">{{ $course->level->name ?? '—' }}</td>
                                    <td class="px-4 py-3 dark:text-white ">{{ $course->created_at->format('Y-m-d') }}</td>
                                    <td class="px-4 py-3 text-right space-x-2">
                                        <a href="{{ route('admin.courses.show', $course) }}"
                                           class="text-sm text-blue-600 dark:text-blue-400 hover:underline">View</a>
                                        <a href="{{ route('admin.courses.edit', $course) }}"
                                           class="text-sm text-yellow-600 dark:text-yellow-400 hover:underline">Edit</a>
                                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST"
                                              class="inline-block"
                                              onsubmit="return confirm('Are you sure you want to delete this course?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-sm text-red-600 dark:text-red-400 hover:underline">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                                        No courses found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t dark:border-gray-600">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
