<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AdminCourse;
use Illuminate\Http\Request;

class AllStudentCourseController extends Controller
{
    public function index()
    {
        $courses = AdminCourse::where('status', 1)
            ->latest()
            ->get();

        return view('Student.all_courses', compact('courses'));
    }
}
