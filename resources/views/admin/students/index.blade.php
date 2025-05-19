<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            All Students
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100 p-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">👨‍🎓 Student List</h3>
                    <a href="{{ route('admin.students.create') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow">
                        + Add Student
                    </a>
                </div>

                @if ($students->isEmpty())
                    <p class="text-gray-500 dark:text-gray-300">No students found.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                    <th class="px-4 py-2 text-left">Name</th>
                                    <th class="px-4 py-2 text-left">Email</th>
                                    <th class="px-4 py-2 text-left">Registered At</th>
                                    <th class="px-4 py-2 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <td class="px-4 py-2 dark:text-white">{{ $student->name }}</td>
                                        <td class="px-4 py-2 dark:text-white">{{ $student->email }}</td>
                                        <td class="px-4 py-2 dark:text-white">{{ $student->created_at->format('Y-m-d') }}</td>
                                        <td class="px-4 py-2 text-right space-x-2">
                                            <a href="{{ route('admin.students.edit', $student) }}"
                                               class="text-sm text-yellow-600 dark:text-yellow-400 hover:underline">Edit</a>
                                            <form action="{{ route('admin.students.destroy', $student) }}" method="POST" class="inline-block"
                                                  onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-sm text-red-600 dark:text-red-400 hover:underline">Delete</button>
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
