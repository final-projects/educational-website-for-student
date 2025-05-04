<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if ($level)
                            <h3 class="text-2xl font-bold mb-8 text-indigo-600 dark:text-indigo-300">
                                Courses for Level: {{ $level->name }} (Age: {{ $age }})
                            </h3>
                        @else
                            <h3 class="text-2xl font-bold mb-8 text-red-500">
                                No suitable level found for your age ({{ $age }})
                            </h3>
                        @endif

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse ($courses as $course)
                                <div
                                    class="rounded-2xl shadow-md bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition duration-300">
                                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">
                                        {{ $course->title }}
                                    </h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                                        {{ $course->description }}
                                    </p>
                                    <a href="#"
                                        class="inline-block mt-auto text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg transition">
                                        View Course
                                    </a>
                                </div>
                            @empty
                                <div class="col-span-3 text-center text-gray-500 dark:text-gray-400">
                                    No courses available for this level.
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
