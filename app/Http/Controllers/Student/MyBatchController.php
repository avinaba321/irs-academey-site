<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyBatchController extends Controller
{
        public function indexAttendances()
    {
        $student = Auth::guard('student')->user();

        $batches = $student->batches()
            ->with('course')
            ->with(['attendances' => function ($q) use ($student) {
                $q->where('student_id', $student->id)
                  ->latest();
            }])
            ->get();

        return view('Student.batches', compact('batches'));
    }

}
