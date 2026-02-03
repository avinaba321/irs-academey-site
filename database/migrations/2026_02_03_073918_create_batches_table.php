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
        Schema::create('batches', function (Blueprint $table) {
             $table->id();

            $table->foreignId('admin_id')
                  ->constrained('admins')
                  ->cascadeOnDelete();

            $table->foreignId('course_id')
                  ->nullable()
                  ->constrained('admin_courses')
                  ->nullOnDelete();

            $table->string('batch_name');
            $table->string('course_name');
            $table->string('trainer_name');

            $table->date('start_date');
            $table->date('end_date')->nullable();

            // Meeting details (single table)
            $table->string('meeting_link')->nullable();

            // Status: 1=Running, 2=Upcoming, 3=Completed
            $table->tinyInteger('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
