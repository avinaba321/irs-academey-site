<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentPaymentDetailsContoller extends Controller
{
   public function myPayments()
{
    $student = Auth::guard('student')->user();

    $payments = StudentPayment::with([
        'course',
        'installments'
    ])->where('student_id', $student->id)
      ->latest()
      ->get();

    return view('Student.payments', compact('payments'));
}

}
