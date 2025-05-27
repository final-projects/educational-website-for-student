<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Course - {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="mb-6 bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-100 p-4 rounded-lg shadow">
                    <ul class="list-disc pl-6">
                        @foreach ($errors->all() as $error)
                            <li class="mb-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data"
                  class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 space-y-8">
                @csrf
                @method('PUT')

                {{-- Course Info --}}
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">📘 Course Info</h3>

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}"
                               class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="level_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Level</label>
                        <select name="level_id" id="level_id"
                                class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                            <option value="">-- Select Level --</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->id }}" {{ old('level_id', $course->level_id) == $level->id ? 'selected' : '' }}>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Description</label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">{{ old('description', $course->description) }}</textarea>
                    </div>
                </div>

                {{-- Materials Update --}}
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">📂 Add New Materials</h3>

                    <div class="mb-4">
                        <label>Upload Images</label>
                        <input type="file" name="images[]" multiple accept="image/*"
                               class="w-full dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label>Upload Videos</label>
                        <input type="file" name="videos[]" multiple accept="video/*"
                               class="w-full dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label>Useful Links (comma separated)</label>
                        <input type="text" name="links" class="w-full dark:bg-gray-900 dark:text-white rounded-md shadow-sm"
                               value="">
                    </div>

                    <div class="mb-4">
                        <label>Summary</label>
                        <textarea name="summary" rows="3"
                                  class="w-full dark:bg-gray-900 dark:text-white rounded-md shadow-sm"></textarea>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <a href="{{ route('admin.courses.index') }}"
                       class="mr-4 inline-block text-sm text-gray-600 dark:text-gray-300 hover:underline">Cancel</a>
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow">
                        Update Course
                    </button>
                </div>
            </form>

            {{-- Existing Materials Preview --}}
            @if ($course->materials->count())
                <div class="mt-10">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">📁 Existing Materials</h4>

                    {{-- Show images --}}
                    @foreach ($course->materials->where('type', 'image') as $img)
                        <img src="{{ asset('storage/' . $img->content) }}" class="w-32 mb-2 rounded shadow">
                    @endforeach

                    {{-- Show videos --}}
                    @foreach ($course->materials->where('type', 'video') as $vid)
                        <video controls class="w-full mb-4 rounded shadow">
                            <source src="{{ asset('storage/' . $vid->content) }}">
                        </video>
                    @endforeach

                    {{-- Show links --}}
                    @foreach ($course->materials->where('type', 'link') as $link)
                        <p class="text-blue-500 hover:underline"><a href="{{ $link->content }}" target="_blank">{{ $link->content }}</a></p>
                    @endforeach

                    {{-- Show summary --}}
                    @foreach ($course->materials->where('type', 'summary') as $summary)
                        <div class="mt-4 bg-gray-50 dark:bg-gray-700 p-4 rounded-md">
                            <strong class="block text-gray-800 dark:text-gray-200">Summary:</strong>
                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $summary->content }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
