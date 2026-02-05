<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentPayment;
use App\Models\InstallmentPayment;
use App\Models\AdminCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


class StudentPaymentController extends Controller
{
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

//   public function initiate(Request $request)
// {
//     $request->validate([
//         'course_id'    => 'required|exists:admin_courses,id',
//         'payment_type' => 'required|in:full,installment',
//     ]);

//     $student = Auth::guard('student')->user();
//     $course  = AdminCourse::findOrFail($request->course_id);

//     $amount = $course->discount_price ?? $course->price;

//     $totalInstallments = $request->payment_type === 'installment' ? 3 : 1;
//     // $perInstallment    = round($amount / $totalInstallments, 2);
//     $amountInPaise = (int) round(
//     ($amount * 100) / $totalInstallments
// );


//     // $payment = StudentPayment::updateOrCreate(
//     //     [
//     //         'student_id' => $student->id,
//     //         'course_id'  => $course->id,
//     //     ],
//     //     [
//     //         'total_amount'       => $amount,
//     //         'payment_type'       => $request->payment_type,
//     //         'total_installments' => $totalInstallments,
//     //         'payment_status'     => 'pending',
//     //     ]
//     // );

//     $payment = StudentPayment::updateOrCreate(
//     [
//         'student_id' => $student->id,
//         'course_id'  => $course->id,
//     ],
//     [
//         'total_amount'       => $amount,
//         'paid_amount'        => 0,
//         'remaining_amount'  => $amount,
//         'paid_installments' => 0,
//         'payment_type'       => $request->payment_type,
//         'total_installments' => $totalInstallments,
//         'payment_status'     => 'pending',
//     ]
// );


//     // Create installments only once
//     if ($request->payment_type === 'installment'
//         && $payment->installments()->count() === 0) {

//         for ($i = 1; $i <= 3; $i++) {
//             InstallmentPayment::create([
//                 'student_payment_id' => $payment->id,
//                 'installment_number' => $i,
//                 'amount' => $amountInPaise,
//                 'status' => 'pending',
//             ]);
//         }
//     }

//    $api = new Api(
//     env('RAZORPAY_KEY'),
//     env('RAZORPAY_SECRET')
// );

//     $order = $api->order->create([
//         'receipt'  => 'rcpt_'.$payment->id,
//         'amount'   => $amountInPaise,
//         'currency' => 'INR'
//     ]);

//     $payment->update([
//         'razorpay_order_id' => $order['id']
//     ]);

//     return response()->json([
//         'success'  => true,
//         'order_id' => $order['id'],
//         'amount'   => $amountInPaise,
//         'key'      => env('RAZORPAY_KEY'),
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

    $existingPayment = StudentPayment::where([
    'student_id' => $student->id,
    'course_id'  => $course->id,
])->first();

if ($existingPayment && $existingPayment->payment_status === 'completed') {
    return response()->json([
        'success' => false,
        'message' => 'Payment already completed for this course'
    ], 400);
}


    $amount = $course->discount_price ?? $course->price;

    $totalInstallments = $request->payment_type === 'installment' ? 3 : 1;

    // Razorpay amount (paise)
    $amountInPaise = (int) round(
        ($amount * 100) / $totalInstallments
    );

    // DB installment amount (rupees)
    $installmentAmount = round($amount / $totalInstallments, 2);

    $payment = StudentPayment::updateOrCreate(
        [
            'student_id' => $student->id,
            'course_id'  => $course->id,
        ],
        [
            'total_amount'        => $amount,
            'paid_amount'         => 0,
            'remaining_amount'   => $amount,
            'paid_installments'  => 0,
            'payment_type'        => $request->payment_type,
            'total_installments'  => $totalInstallments,
            'payment_status'      => 'pending',
        ]
    );

    // if ($request->payment_type === 'installment'
    //     && $payment->installments()->count() === 0) {

    //     for ($i = 1; $i <= $totalInstallments; $i++) {
    //         InstallmentPayment::create([
    //             'student_payment_id' => $payment->id,
    //             'installment_number' => $i,
    //             'amount'             => $installmentAmount,
    //             'status'             => 'pending',
    //         ]);
    //     }
    // }

    if ($payment->payment_type === 'installment') {

    // Mark next pending installment as paid
    $installment = InstallmentPayment::where(
        'student_payment_id',
        $payment->id
    )->where('status', 'pending')->orderBy('installment_number')->first();

    if (!$installment) {
        // 🔒 Safety net: all installments already paid
        $payment->update([
            'remaining_amount' => 0,
            'payment_status'   => 'completed'
        ]);

        return response()->json(['success' => true]);
    }

    $installment->update([
        'status' => 'paid',
    ]);

    $payment->increment('paid_installments');
    $payment->increment('paid_amount', $installment->amount);
    $payment->decrement('remaining_amount', $installment->amount);

    // FINAL INSTALLMENT CHECK
    if ($payment->paid_installments + 1 >= $payment->total_installments) {
        $payment->update([
            'remaining_amount' => 0,
            'payment_status'   => 'completed'
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


public function verify(Request $request)
{
    $request->validate([
        'razorpay_payment_id' => 'required',
        'razorpay_order_id'   => 'required',
        'razorpay_signature'  => 'required',
    ]);

    $api = new Api(
        env('RAZORPAY_KEY'),
        env('RAZORPAY_SECRET')
    );

    try {
        // 🔐 Verify signature
        $api->utility->verifyPaymentSignature([
            'razorpay_order_id'   => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature'  => $request->razorpay_signature,
        ]);
    } catch (SignatureVerificationError $e) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid payment signature'
        ], 400);
    }

    // Find payment record
    $payment = StudentPayment::where(
        'razorpay_order_id',
        $request->razorpay_order_id
    )->firstOrFail();

    // FULL PAYMENT
    if ($payment->payment_type === 'full') {

        $payment->update([
            'paid_amount'       => $payment->total_amount,
            'remaining_amount' => 0,
            'payment_status'   => 'completed',
        ]);
    }

    // INSTALLMENT PAYMENT
    if ($payment->payment_type === 'installment') {

        // Get next unpaid installment
        $installment = InstallmentPayment::where(
            'student_payment_id',
            $payment->id
        )->where('status', 'pending')->first();

        if ($installment) {
            $installment->update([
                'status' => 'paid',
            ]);

            $payment->increment('paid_installments');
            $payment->increment('paid_amount', $installment->amount);
            $payment->decrement('remaining_amount', $installment->amount);

            // If all installments paid
            if ($payment->paid_installments >= $payment->total_installments) {
                $payment->update([
                    'payment_status' => 'completed'
                ]);
            }
        }
    }

    return response()->json([
        'success' => true
    ]);
}


}
