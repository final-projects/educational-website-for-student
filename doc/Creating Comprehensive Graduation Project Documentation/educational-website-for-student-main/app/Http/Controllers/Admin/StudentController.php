<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::all();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'birth_date' => [
                'required',
                'date',
                'before_or_equal:' . now()->subYears(3)->toDateString(),
                'after_or_equal:' . now()->subYears(100)->toDateString(),
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'birth_date' => $validated['birth_date'],
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Student added successfully.');
    }

    public function show($id)
    {
        $student = User::findOrFail($id);
        return view('admin.students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, User $student)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $student->id,
            'birth_date' => [
                'required',
                'date',
                'before_or_equal:' . now()->subYears(3)->toDateString(),
                'after_or_equal:' . now()->subYears(100)->toDateString(),
            ],        ]);

        $student->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'birth_date' => $request->birth_date,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = User::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully.');
    }
}
