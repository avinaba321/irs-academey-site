<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProfileDetailsController extends Controller
{
    public function profileIndex()
    {
        $student = Auth::guard('student')->user();
        return view('Student.my_profile', compact('student'));
    }
}
