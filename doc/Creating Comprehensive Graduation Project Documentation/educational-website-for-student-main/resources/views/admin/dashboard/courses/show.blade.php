<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- 🧾 بيانات الكورس --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                @if ($course->image)
                    <img src="{{ asset('storage/' . $course->image) }}"
                         alt="{{ $course->title }}"
                         class="w-full max-h-[300px] object-cover rounded-xl shadow mb-6">
                @endif

                <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-300 mb-2">{{ $course->title }}</h3>
                <p class="text-md text-gray-700 dark:text-gray-300 mb-4">{{ $course->description }}</p>

                @if($course->level)
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">
                        <strong>Level:</strong> {{ $course->level->name }}
                    </p>
                @endif

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <strong>Created:</strong> {{ $course->created_at->format('F j, Y') }}
                </p>

                <div class="mt-6">
                    <a href="{{ route('admin.courses.index') }}"
                       class="text-sm font-medium text-indigo-600 dark:text-indigo-300 hover:underline">
                        ← Back to Courses
                    </a>
                </div>
            </div>

            {{-- 🎓 المواد التعليمية --}}
            @if ($course->materials->count())
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 space-y-8">

                    {{-- الصور --}}
                    @php $images = $course->materials->where('type', 'image'); @endphp
                    @if ($images->count())
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">🖼️ Images</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach ($images as $img)
                                    <img src="{{ asset('storage/' . $img->content) }}"
                                         class="rounded-lg shadow object-cover w-full max-h-64">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- الفيديوهات --}}
                    @php $videos = $course->materials->where('type', 'video'); @endphp
                    @if ($videos->count())
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">🎥 Videos</h4>
                            <div class="space-y-4">
                                @foreach ($videos as $vid)
                                    <video controls class="w-full rounded-lg shadow">
                                        <source src="{{ asset('storage/' . $vid->content) }}">
                                        Your browser does not support the video tag.
                                    </video>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- الروابط --}}
                    @php $links = $course->materials->where('type', 'link'); @endphp
                    @if ($links->count())
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">🔗 Useful Links</h4>
                            <ul class="list-disc list-inside text-blue-500 dark:text-blue-400 space-y-2">
                                @foreach ($links as $link)
                                    <li>
                                        <a href="{{ $link->content }}" target="_blank" class="hover:underline">
                                            {{ $link->content }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- الملخص النصي --}}
                    @php $summary = $course->materials->firstWhere('type', 'summary'); @endphp
                    @if ($summary)
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-md p-4 shadow">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">📄 Summary</h4>
                            <p class="text-sm text-gray-700 dark:text-gray-300 whitespace-pre-wrap">{{ $summary->content }}</p>
                        </div>
                    @endif
                </div>
            @endif

        </div>
    </div>
</x-admin-layout>
