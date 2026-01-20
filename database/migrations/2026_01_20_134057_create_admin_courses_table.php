<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_courses', function (Blueprint $table) {
            $table->id();

            // Admin who created the course
            $table->foreignId('admin_id')
                  ->constrained('admins')
                  ->cascadeOnDelete();

            // Course details
            $table->string('course_image')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('duration'); // e.g. "6 Months", "300 Hours"

            // Pricing
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();

            // Status
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_courses');
    }
};
