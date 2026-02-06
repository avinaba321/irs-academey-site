<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstallmentPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_payment_id',
        'installment_number',
        'amount',
        'status',
        'razorpay_payment_id',
        'razorpay_order_id',
        'razorpay_signature',
        'paid_at',
        'due_date',
        'failure_reason',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'due_date' => 'datetime',
    ];

    /* ======================
       RELATIONSHIPS
    ====================== */

    // public function studentPayment()
    // {
    //     return $this->belongsTo(StudentPayment::class,'student_payment_id');
    // }

     public function payment()
    {
        return $this->belongsTo(StudentPayment::class, 'student_payment_id');
    }

    /* ======================
       HELPERS
    ====================== */

    public function isPaid()
    {
        return $this->status === 'paid';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }
}
