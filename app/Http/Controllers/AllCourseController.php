<?php

namespace App\Http\Controllers;

use App\Models\AdminCourse;
use Illuminate\Http\Request;

class AllCourseController extends Controller
{
    public function index()
    {
        // ✅ Only show ACTIVE courses
        $courses = AdminCourse::where('status', 1)
            ->latest()
            ->get();

        return view('Courses.home_courses', compact('courses'));
    }
}
