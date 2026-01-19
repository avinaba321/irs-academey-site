<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDashboradController extends Controller
{
    public function index()
    {
        return view('Student.student_dashboard');
    }
}
