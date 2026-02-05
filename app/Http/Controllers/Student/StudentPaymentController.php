<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentPayment;
use App\Models\InstallmentPayment;
use App\Models\AdminCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;


class StudentPaymentController extends Controller
{
    // public function initiate(Request $request)
    // {
    //     $request->validate([
    //         'course_id' => 'required|exists:admin_courses,id',
    //         'payment_type' => 'required|in:full,installment',
    //     ]);

    //     $student = Auth::guard('student')->user();
    //     $course  = AdminCourse::findOrFail($request->course_id);

    //     $amount = $course->discount_price ?? $course->price;

    //     // INSTALLMENT LOGIC
    //     if ($request->payment_type === 'installment') {
    //         $totalInstallments = 3;
    //         $perInstallment = round($amount / $totalInstallments, 2);
    //     } else {
    //         $totalInstallments = null;
    //         $perInstallment = $amount;
    //     }

    //     // Create student_payments
    //     // $payment = StudentPayment::create([
    //     //     'student_id' => $student->id,
    //     //     'course_id' => $course->id,
    //     //     'total_amount' => $amount,
    //     //     'paid_amount' => 0,
    //     //     'remaining_amount' => $amount,
    //     //     'payment_type' => $request->payment_type,
    //     //     'total_installments' => $totalInstallments,
    //     //     'payment_status' => 'pending'
    //     // ]);
    //     $payment = StudentPayment::updateOrCreate(
    // [
    //         'student_id' =>$student->id,
    //         'course_id'  => $course->id,
    //     ],
    //     [
    //         'total_amount'       => $request->amount,
    //         'payment_type'       => $request->payment_type,
    //         'total_installments' => $request->total_installments,
    //         'payment_status'     => 'pending',
    //     ]
    // );


    //     // Create installment rows (only for installment)
    //     if ($request->payment_type === 'installment') {
    //         for ($i = 1; $i <= 3; $i++) {
    //             InstallmentPayment::create([
    //                 'student_payment_id' => $payment->id,
    //                 'installment_number' => $i,
    //                 'amount' => $perInstallment,
    //                 'status' => 'pending',
    //             ]);
    //         }
    //     }

    //     // Razorpay Order
    //     $api = new Api(env('RAZORPAY_KEY'),env('RAZORPAY_SECRECT'));

    //     $order = $api->order->create([
    //         'receipt' => 'rcpt_'.$payment->id,
    //         'amount' => $perInstallment * 100,
    //         'currency' => 'INR'
    //     ]);

    //     // Save order id
    //     $payment->update([
    //         'razorpay_order_id' => $order['id']
    //     ]);

    //     return response()->json([
    //         'order_id' => $order['id'],
    //         'amount' => $perInstallment,
    //         'key' => env('RAZORPAY_KEY'),
    //         'payment_id' => $payment->id
    //     ]);
    // }

  public function initiate(Request $request)
{
    $request->validate([
        'course_id'    => 'required|exists:admin_courses,id',
        'payment_type' => 'required|in:full,installment',
    ]);

    $student = Auth::guard('student')->user();
    $course  = AdminCourse::findOrFail($request->course_id);

    $amount = $course->discount_price ?? $course->price;

    $totalInstallments = $request->payment_type === 'installment' ? 3 : 1;
    // $perInstallment    = round($amount / $totalInstallments, 2);
    $amountInPaise = (int) round(
    ($amount * 100) / $totalInstallments
);


    $payment = StudentPayment::updateOrCreate(
        [
            'student_id' => $student->id,
            'course_id'  => $course->id,
        ],
        [
            'total_amount'       => $amount,
            'payment_type'       => $request->payment_type,
            'total_installments' => $totalInstallments,
            'payment_status'     => 'pending',
        ]
    );

    // Create installments only once
    if ($request->payment_type === 'installment'
        && $payment->installments()->count() === 0) {

        for ($i = 1; $i <= 3; $i++) {
            InstallmentPayment::create([
                'student_payment_id' => $payment->id,
                'installment_number' => $i,
                'amount' => $amountInPaise,
                'status' => 'pending',
            ]);
        }
    }

   $api = new Api(
    env('RAZORPAY_KEY'),
    env('RAZORPAY_SECRET')
);

    $order = $api->order->create([
        'receipt'  => 'rcpt_'.$payment->id,
        'amount'   => $amountInPaise,
        'currency' => 'INR'
    ]);

    $payment->update([
        'razorpay_order_id' => $order['id']
    ]);

    return response()->json([
        'success'  => true,
        'order_id' => $order['id'],
        'amount'   => $amountInPaise,
        'key'      => env('RAZORPAY_KEY'),
    ]);
}

}
