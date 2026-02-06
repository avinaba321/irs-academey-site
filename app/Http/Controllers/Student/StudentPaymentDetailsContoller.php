<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
    use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\InstallmentPayment;

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

 // ✅ NEW: Pay next installment
    public function payNextInstallment($paymentId)
    {
        $student = Auth::guard('student')->user();
        
        $payment = StudentPayment::with('installments')
            ->where('id', $paymentId)
            ->where('student_id', $student->id)
            ->firstOrFail();

        // Check if payment is completed
        if ($payment->payment_status === 'completed') {
            return response()->json([
                'success' => false,
                'message' => 'All installments already paid'
            ], 400);
        }

        // Get next pending installment
        $nextInstallment = $payment->installments()
            ->where('status', 'pending')
            ->orderBy('installment_number')
            ->first();

        if (!$nextInstallment) {
            return response()->json([
                'success' => false,
                'message' => 'No pending installments'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'payment_id' => $payment->id,
            'installment_number' => $nextInstallment->installment_number,
            'amount' => $nextInstallment->amount
        ]);
    }



public function downloadInvoice(InstallmentPayment $installment)
{
    // 🔐 Allow only PAID installments
    if ($installment->status !== 'paid') {
        abort(403, 'Invoice not available');
    }

    $payment = $installment->payment;

    // 🔐 Ensure student owns this payment
    if ($payment->student_id !== Auth::guard('student')->id()) {
        abort(403);
    }

    $pdf = Pdf::loadView('Student.installment', [
        'installment' => $installment,
        'payment'     => $payment,
        'student'     => Auth::guard('student')->user(),
    ])->setPaper('A4');

    return $pdf->download(
        'Invoice_Installment_'.$installment->installment_number.'.pdf'
    );
}



}
