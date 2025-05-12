<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">

                    {{-- صورة الكورس إن وجدت --}}
                    @if ($course->image)
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $course->image) }}"
                                 alt="{{ $course->title }}"
                                 class="w-full max-h-[300px] object-cover rounded-xl shadow">
                        </div>
                    @endif

                    {{-- عنوان ووصف الكورس --}}
                    <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-300 mb-4">
                        {{ $course->title }}
                    </h3>

                    <p class="text-md text-gray-700 dark:text-gray-300 mb-6">
                        {{ $course->description }}
                    </p>

                    {{-- المستوى المرتبط بالكورس --}}
                    @if($course->level)
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <strong>{{ __('Level') }}:</strong> {{ $course->level->name }}
                        </p>
                    @endif

                    {{-- تاريخ الإنشاء --}}
                    @if($course->created_at)
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <strong>{{ __('Created At') }}:</strong> {{ $course->created_at->format('F j, Y') }}
                        </p>
                    @endif

                    {{-- زر الرجوع --}}
                    <a href="{{ route('dashboard') }}"
                       class="inline-block text-sm font-medium text-indigo-600 dark:text-indigo-300 hover:underline mt-6">
                        ← Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
