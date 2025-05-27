<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- 🧾 معلومات الكورس --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                @if ($course->image)
                    <img src="{{ asset('storage/' . $course->image) }}"
                         alt="{{ $course->title }}"
                         class="w-full max-h-[300px] object-cover rounded-xl shadow mb-6">
                @endif

                <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-300 mb-4">{{ $course->title }}</h3>

                <p class="text-md text-gray-700 dark:text-gray-300 mb-4">
                    {{ $course->description }}
                </p>

                @if($course->level)
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">
                        <strong>Level:</strong> {{ $course->level->name }}
                    </p>
                @endif

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <strong>Created At:</strong> {{ $course->created_at->format('F j, Y') }}
                </p>

                <a href="{{ route('dashboard') }}"
                   class="inline-block mt-6 text-sm text-indigo-600 dark:text-indigo-300 hover:underline">
                    ← Back to Dashboard
                </a>
            </div>

            {{-- 📂 المواد التعليمية --}}
            @if ($course->materials->count())
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 space-y-6">

                    {{-- صور --}}
                    @php $images = $course->materials->where('type', 'image'); @endphp
                    @if ($images->count())
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">🖼️ Images</h4>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                @foreach ($images as $img)
                                    <img src="{{ asset('storage/' . $img->content) }}"
                                         class="w-full rounded-lg object-cover shadow max-h-48">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- فيديوهات --}}
                    @php $videos = $course->materials->where('type', 'video'); @endphp
                    @if ($videos->count())
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">🎥 Videos</h4>
                            <div class="space-y-4">
                                @foreach ($videos as $vid)
                                    <video controls class="w-full rounded shadow">
                                        <source src="{{ asset('storage/' . $vid->content) }}">
                                        Your browser does not support the video tag.
                                    </video>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- روابط --}}
                    @php $links = $course->materials->where('type', 'link'); @endphp
                    @if ($links->count())
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">🔗 Useful Links</h4>
                            <ul class="list-disc list-inside text-blue-500 dark:text-blue-300 space-y-1">
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

                    {{-- ملخص --}}
                    @php $summary = $course->materials->firstWhere('type', 'summary'); @endphp
                    @if ($summary)
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-md">
                            <h5 class="font-semibold text-gray-800 dark:text-gray-100 mb-2">📄 Summary</h5>
                            <p class="text-sm text-gray-700 dark:text-gray-300 whitespace-pre-wrap">
                                {{ $summary->content }}
                            </p>
                        </div>
                    @endif
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
