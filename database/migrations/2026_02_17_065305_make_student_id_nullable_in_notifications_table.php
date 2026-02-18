<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('notifications', function (Blueprint $table) {

            // ✅ STEP 1: Drop foreign key constraint first
            $table->dropForeign(['student_id']);

            // ✅ STEP 2: Now drop the index
            $table->dropIndex(['student_id', 'is_read']);

            // ✅ STEP 3: Make student_id nullable and re-add foreign key
            $table->foreignId('student_id')
                ->nullable()
                ->change();

            // ✅ STEP 4: Re-add foreign key with nullable support
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            // ✅ STEP 5: Re-add indexes
            $table->index(['student_id', 'is_read']);
            $table->index(['admin_id', 'is_read']);
        });
    }

    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Reverse: drop foreign key
            $table->dropForeign(['student_id']);
            $table->dropIndex(['student_id', 'is_read']);
            $table->dropIndex(['admin_id', 'is_read']);

            // Re-add as not nullable
            $table->foreignId('student_id')
                ->nullable(false)
                ->change();

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->index(['student_id', 'is_read']);
        });
    }
};