<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentPayment;
use App\Models\InstallmentPayment;
use App\Models\AdminCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


class StudentPaymentController extends Controller
{

    // public function initiate(Request $request)
    // {

    //     $request->validate([
    //         'course_id'    => 'required|exists:admin_courses,id',
    //         'payment_type' => 'required|in:full,installment',
    //     ]);

    //     $student = Auth::guard('student')->user();
    //     $course  = AdminCourse::findOrFail($request->course_id);

    //     $existingPayment = StudentPayment::where([
    //         'student_id' => $student->id,
    //         'course_id'  => $course->id,
    //     ])->first();

    //     if ($existingPayment && $existingPayment->payment_status === 'completed') {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Payment already completed for this course'
    //         ], 400);
    //     }


    //     $amount = $course->discount_price ?? $course->price;

    //     $totalInstallments = $request->payment_type === 'installment' ? 3 : 1;

    //     $amountInPaise = (int) round(
    //         ($amount * 100) / $totalInstallments
    //     );

    //     $installmentAmount = round($amount / $totalInstallments, 2);

    //     $payment = StudentPayment::updateOrCreate(
    //         [
    //             'student_id' => $student->id,
    //             'course_id'  => $course->id,
    //         ],
    //         [
    //             'total_amount'        => $amount,
    //             'paid_amount'         => 0,
    //             'remaining_amount'   => $amount,
    //             'paid_installments'  => 0,
    //             'payment_type'        => $request->payment_type,
    //             'total_installments'  => $totalInstallments,
    //             'payment_status'      => 'pending',
    //         ]
    //     );

    //     if (
    //         $request->payment_type === 'installment'
    //         && $payment->installments()->count() === 0
    //     ) {

    //         for ($i = 1; $i <= $totalInstallments; $i++) {
    //             InstallmentPayment::create([
    //                 'student_payment_id' => $payment->id,
    //                 'installment_number' => $i,
    //                 'amount'             => $installmentAmount,
    //                 'status'             => 'pending',
    //             ]);
    //         }
    //     }

    //     $api = new Api(
    //         env('RAZORPAY_KEY'),
    //         env('RAZORPAY_SECRET')
    //     );

    //     $order = $api->order->create([
    //         'receipt'  => 'rcpt_' . $payment->id,
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

    // ✅ CALCULATE INSTALLMENT AMOUNTS WITH PROPER ROUNDING
    $installmentAmount = round($amount / $totalInstallments, 2);
    $lastInstallmentAmount = $amount - ($installmentAmount * ($totalInstallments - 1));

    // Razorpay amount (paise) - for first/current installment
    $amountInPaise = (int) round(($amount * 100) / $totalInstallments);

    if (!$existingPayment) {
        $payment = StudentPayment::create([
            'student_id'          => $student->id,
            'course_id'           => $course->id,
            'total_amount'        => $amount,
            'paid_amount'         => 0,
            'remaining_amount'    => $amount,
            'paid_installments'   => 0,
            'payment_type'        => $request->payment_type,
            'total_installments'  => $totalInstallments,
            'payment_status'      => 'pending',
        ]);

        // ✅ CREATE INSTALLMENTS WITH PROPER ROUNDING
        if ($request->payment_type === 'installment') {
            for ($i = 1; $i <= $totalInstallments; $i++) {
                InstallmentPayment::create([
                    'student_payment_id' => $payment->id,
                    'installment_number' => $i,
                    // Last installment gets the remaining amount
                    'amount'             => $i === $totalInstallments 
                                            ? $lastInstallmentAmount 
                                            : $installmentAmount,
                    'status'             => 'pending',
                ]);
            }
        }
    } else {
        $payment = $existingPayment;

        if ($payment->payment_type !== $request->payment_type) {
            return response()->json([
                'success' => false,
                'message' => 'Payment type mismatch. Original payment was ' . $payment->payment_type
            ], 400);
        }

        if ($request->payment_type === 'installment' && $payment->installments()->count() === 0) {
            for ($i = 1; $i <= $totalInstallments; $i++) {
                InstallmentPayment::create([
                    'student_payment_id' => $payment->id,
                    'installment_number' => $i,
                    'amount'             => $i === $totalInstallments 
                                            ? $lastInstallmentAmount 
                                            : $installmentAmount,
                    'status'             => 'pending',
                ]);
            }
        }
    }

    // ✅ GET NEXT PENDING INSTALLMENT AMOUNT FOR RAZORPAY
    if ($payment->payment_type === 'installment') {
        $nextInstallment = $payment->installments()
            ->where('status', 'pending')
            ->orderBy('installment_number')
            ->first();
        
        if ($nextInstallment) {
            $amountInPaise = (int) round($nextInstallment->amount * 100);
        }
    }

    $api = new Api(
        env('RAZORPAY_KEY'),
        env('RAZORPAY_SECRET')
    );

    $order = $api->order->create([
        'receipt'  => 'rcpt_' . $payment->id . '_' . time(),
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

    $payment = StudentPayment::where(
        'razorpay_order_id',
        $request->razorpay_order_id
    )->firstOrFail();

    // FULL PAYMENT
    if ($payment->payment_type === 'full') {
        $payment->update([
            'paid_amount'       => $payment->total_amount,
            'remaining_amount'  => 0,
            'paid_installments' => 1,
            'payment_status'    => 'completed',
        ]);
    }

    // INSTALLMENT PAYMENT
    if ($payment->payment_type === 'installment') {
        
        $installment = InstallmentPayment::where(
            'student_payment_id',
            $payment->id
        )
        ->where('status', 'pending')
        ->orderBy('installment_number')
        ->first();

        if ($installment) {
            $installment->update([
                'status'               => 'paid',
                'razorpay_payment_id'  => $request->razorpay_payment_id,
                'razorpay_order_id'    => $request->razorpay_order_id,
                'razorpay_signature'   => $request->razorpay_signature,
                'paid_at'              => now(),
            ]);

            $newPaidAmount = $payment->paid_amount + $installment->amount;
            $newPaidInstallments = $payment->paid_installments + 1;

            // ✅ CHECK IF THIS IS THE LAST INSTALLMENT
            $isLastInstallment = $newPaidInstallments >= $payment->total_installments;

            $payment->update([
                'paid_amount'        => $newPaidAmount,
                // ✅ Set remaining to 0 if last installment
                'remaining_amount'   => $isLastInstallment 
                                        ? 0 
                                        : $payment->total_amount - $newPaidAmount,
                'paid_installments'  => $newPaidInstallments,
                'payment_status'     => $isLastInstallment 
                                        ? 'completed' 
                                        : 'pending'
            ]);

            Log::info('Payment Updated', [
                'payment_id' => $payment->id,
                'installment_number' => $installment->installment_number,
                'installment_amount' => $installment->amount,
                'new_paid_amount' => $newPaidAmount,
                'new_remaining_amount' => $payment->remaining_amount,
                'paid_installments' => $newPaidInstallments,
                'total_installments' => $payment->total_installments,
                'is_last_installment' => $isLastInstallment
            ]);
        }
    }

    return response()->json([
        'success' => true,
        'payment' => [
            'paid_amount' => $payment->paid_amount,
            'remaining_amount' => $payment->remaining_amount,
            'paid_installments' => $payment->paid_installments,
            'status' => $payment->payment_status
        ]
    ]);
}

    // public function verify(Request $request)
    // {
    //     $request->validate([
    //         'razorpay_payment_id' => 'required',
    //         'razorpay_order_id'   => 'required',
    //         'razorpay_signature'  => 'required',
    //     ]);

    //     $api = new Api(
    //         env('RAZORPAY_KEY'),
    //         env('RAZORPAY_SECRET')
    //     );

    //     try {
            
    //         $api->utility->verifyPaymentSignature([
    //             'razorpay_order_id'   => $request->razorpay_order_id,
    //             'razorpay_payment_id' => $request->razorpay_payment_id,
    //             'razorpay_signature'  => $request->razorpay_signature,
    //         ]);
    //     } catch (SignatureVerificationError $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Invalid payment signature'
    //         ], 400);
    //     }

        
    //     $payment = StudentPayment::where(
    //         'razorpay_order_id',
    //         $request->razorpay_order_id
    //     )->firstOrFail();

       
    //     if ($payment->payment_type === 'full') {

    //         $payment->update([
    //             'paid_amount'       => $payment->total_amount,
    //             'remaining_amount' => 0,
    //             'payment_status'   => 'completed',
    //         ]);
    //     }

      
    //     if ($payment->payment_type === 'installment') {

           
    //         $installment = InstallmentPayment::where(
    //             'student_payment_id',
    //             $payment->id
    //         )->where('status', 'pending')->first();

    //         if ($installment) {
    //             $installment->update([
    //                 'status'               => 'paid',
    //                 'razorpay_payment_id'  => $request->razorpay_payment_id,
    //                 'razorpay_order_id'    => $request->razorpay_order_id,
    //                 'razorpay_signature'   => $request->razorpay_signature,
    //                 'paid_at'              => now(),
    //             ]);

    //             $payment->increment('paid_installments');
    //             $payment->increment('paid_amount', $installment->amount);
    //             $payment->decrement('remaining_amount', $installment->amount);

    //             if ($payment->paid_installments >= $payment->total_installments) {
    //                 $payment->update([
    //                     'payment_status' => 'completed'
    //                 ]);
    //             }
    //         }
    //     }

    //     return response()->json([
    //         'success' => true
    //     ]);
    // }

    public function fail(Request $request)
    {
        $request->validate([
            'razorpay_order_id' => 'required',
            'reason'            => 'nullable|string',
        ]);

        $payment = StudentPayment::where(
            'razorpay_order_id',
            $request->razorpay_order_id
        )->first();

        if (!$payment) {
            return response()->json(['success' => false], 404);
        }

        // Mark payment failed ONLY if not completed
        if ($payment->payment_status !== 'completed') {
            $payment->update([
                'payment_status' => 'failed'
            ]);
        }

        return response()->json(['success' => true]);
    }
}
