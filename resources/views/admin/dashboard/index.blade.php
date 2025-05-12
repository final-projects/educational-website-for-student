<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Welcome Box --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-2">Welcome, {{ $admin->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">You are logged in as an administrator.</p>
                </div>
            </div>

            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Users Count --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow text-center">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Users</h4>
                    <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-300">{{ $userCount }}</p>
                </div>

                {{-- Courses Count --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow text-center">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Courses</h4>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-300">{{ $courseCount }}</p>
                </div>

                {{-- Levels Count --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow text-center">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Levels</h4>
                    <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-300">{{ $levelCount }}</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
