<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. Calculate user's age from birth_date
        $age = $user->age ;

        // 2. Get level that matches the age range
        $level = $age
            ? Level::where('min_age', '<=', $age)
                    ->where('max_age', '>=', $age)
                    ->first()
            : null;

        // 3. Get courses for this level
        $courses = $level
            ? Course::where('level_id', $level->id)->get()
            : collect(); // return empty collection if no level

        return view('dashboard.index', compact('courses', 'level', 'age'));
    }
}
