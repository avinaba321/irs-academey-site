<?php

namespace App\Http\Controllers\Student;
use Illuminate\Support\Facades\Auth;
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

       $student = Auth::guard('student')->user();;

        // ✅ Only DOB check
        $profileComplete = $student && !is_null($student->dob);

        return view('Student.all_courses', compact(
            'courses',
            'profileComplete',
            'student'
        ));
    }
}
