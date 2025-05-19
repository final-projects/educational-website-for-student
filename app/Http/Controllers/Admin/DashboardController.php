<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Level;
class DashboardController extends Controller
{


    public function index()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.dashboard.index', [
            'admin' => $admin,
            'studentCount' => User::count(),
            'courseCount' => Course::count(),
            'levelCount' => Level::count(),
        ]);
    }

}
