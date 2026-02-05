<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'total_amount',
        'paid_amount',
        'remaining_amount',
        'payment_type',
        'total_installments',
        'paid_installments',
        'payment_status',
        'razorpay_order_id',
    ];

    /* ======================
       RELATIONSHIPS
    ====================== */

    // Student who made payment
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Course purchased
    public function course()
    {
        return $this->belongsTo(AdminCourse::class, 'course_id');
    }

    // Installments
    public function installments()
    {
        return $this->hasMany(InstallmentPayment::class);
    }

    /* ======================
       HELPERS
    ====================== */

    // Check if fully paid
    public function isCompleted()
    {
        return $this->payment_status === 'completed';
    }

    // Check installment mode
    public function isInstallment()
    {
        return $this->payment_type === 'installment';
    }
}
