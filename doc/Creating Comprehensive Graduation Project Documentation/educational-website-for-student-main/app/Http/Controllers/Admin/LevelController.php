<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::ordered()->get();
        return view('admin.levels.index', compact('levels'));
    }

    public function create()
    {
        return view('admin.levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:levels,name',
            'description' => 'nullable|string|max:1000',
            'min_age'     => 'required|integer|min:0|max:100',
            'max_age'     => 'required|integer|min:0|max:100|gte:min_age',
            'order'       => 'required|integer|min:0',
        ]);
        // dd( $request->all());
        Level::create($request->only(['name', 'description', 'min_age', 'max_age', 'order']));

        return redirect()->route('admin.levels.index')->with('success', 'Level added successfully.');
    }
    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }

    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:levels,name,' . $level->id,
            'description' => 'nullable|string|max:1000',
            'min_age'     => 'required|integer|min:0|max:100',
            'max_age'     => 'required|integer|min:0|max:100|gte:min_age',
            'order'       => 'nullable|integer|min:0',
        ]);

        $level->update($request->only(['name', 'description', 'min_age', 'max_age', 'order']));

        return redirect()->route('admin.levels.index')->with('success', 'Level updated successfully.');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('admin.levels.index')->with('success', 'Level deleted successfully.');
    }
}
