<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('level')->latest()->paginate(10);
        return view('admin.dashboard.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('admin.dashboard.courses.show', compact('course'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('admin.dashboard.courses.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'level_id'    => 'nullable|exists:levels,id',
            'summary'     => 'nullable|string',

            'images.*'    => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'videos.*'    => 'nullable|file|mimes:mp4,mov,avi,webm|max:10240',
            'links'       => 'nullable|string', // comma separated
        ]);

        // إنشاء الكورس
        $course = Course::create($request->only(['title', 'description', 'level_id']));

        // ✅ تخزين الـ summary كنص
        if ($request->filled('summary')) {
            $course->materials()->create([
                'type' => 'summary',
                'content' => $request->summary,
            ]);
        }

        // ✅ تخزين الصور بعد رفعها
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('courses/images', 'public');
                $course->materials()->create([
                    'type' => 'image',
                    'content' => $path,
                ]);
            }
        }

        // ✅ تخزين الفيديوهات بعد رفعها
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $path = $video->store('courses/videos', 'public');
                $course->materials()->create([
                    'type' => 'video',
                    'content' => $path,
                ]);
            }
        }

        // ✅ تخزين الروابط الخارجية المفصولة بفواصل
        if ($request->filled('links')) {
            foreach (explode(',', $request->links) as $url) {
                $url = trim($url);
                if (filter_var($url, FILTER_VALIDATE_URL)) {
                    $course->materials()->create([
                        'type' => 'link',
                        'content' => $url,
                    ]);
                }
            }
        }

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course and all uploaded materials were saved successfully.');
    }


    public function edit(Course $course)
    {
        $levels = Level::all();
        return view('admin.dashboard.courses.edit', compact('course', 'levels'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'level_id'    => 'nullable|exists:levels,id',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'level_id']);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وجدت
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
