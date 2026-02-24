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
        Schema::table('student_queries', function (Blueprint $table) {
            // ✅ Perfect index for this exact query
            $table->index(['student_id', 'created_at'], 'idx_student_created');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_queries', function (Blueprint $table) {
            $table->dropIndex('idx_student_created');
        });
    }
};
