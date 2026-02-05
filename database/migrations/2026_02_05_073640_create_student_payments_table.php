<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->foreignId('course_id')
                ->constrained('admin_courses')
                ->cascadeOnDelete();

            $table->decimal('total_amount', 10, 2);
            $table->decimal('paid_amount', 10, 2)->default(0.00);
            $table->decimal('remaining_amount', 10, 2);

            $table->enum('payment_type', ['full', 'installment'])->default('full');

            $table->unsignedInteger('total_installments')->nullable();
            $table->unsignedInteger('paid_installments')->default(0);

            $table->enum('payment_status', [
                'pending',
                'partial',
                'completed',
                'failed'
            ])->default('pending');

            $table->string('razorpay_order_id')->nullable();

            $table->timestamps();

            // Prevent duplicate purchase of same course
            $table->unique(['student_id', 'course_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_payments');
    }
};
