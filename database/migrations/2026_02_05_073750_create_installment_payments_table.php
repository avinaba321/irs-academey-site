<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('installment_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_payment_id')
                ->constrained('student_payments')
                ->cascadeOnDelete();

            $table->unsignedInteger('installment_number'); // 1, 2, 3
            $table->decimal('amount', 10, 2);

            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');

            $table->string('razorpay_payment_id')->nullable();
            $table->string('razorpay_order_id')->nullable();
            $table->string('razorpay_signature')->nullable();

            $table->timestamp('paid_at')->nullable();
            $table->timestamp('due_date')->nullable();

            $table->text('failure_reason')->nullable();

            $table->timestamps();

            // Prevent duplicate installment numbers
            $table->unique(
                ['student_payment_id', 'installment_number'],
                'sp_installment_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('installment_payments');
    }
};
