<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Edit Student
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

            <form action="{{ route('admin.students.update', $student) }}" method="POST"
                  class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 space-y-6">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Name
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}"
                           class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Email
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}"
                           class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                </div>

                {{-- Birth Date --}}
                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Birth Date
                    </label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $student->birth_date) }}"
                           class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                </div>

                {{-- Age (read only) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Age (calculated)
                    </label>
                    <input type="text" value="{{ $student->age }}" readonly
                           class="w-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-md shadow-sm cursor-not-allowed">
                </div>

                {{-- Level --}}

                {{-- Submit --}}
                <div class="flex justify-end mt-6">
                    <a href="{{ route('admin.students.index') }}"
                       class="mr-4 inline-block text-sm text-gray-600 dark:text-gray-300 hover:underline">
                        Cancel
                    </a>
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow">
                        Update Student
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
