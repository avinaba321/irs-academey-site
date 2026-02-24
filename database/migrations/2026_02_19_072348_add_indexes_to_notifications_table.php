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
       Schema::table('notifications', function (Blueprint $table) {
            // ✅ Add performance indexes
            $table->index(['id', 'admin_id', 'student_id'], 'idx_id_admin_student');
            $table->index(['admin_id', 'is_read', 'created_at'], 'idx_admin_read_created');
            $table->index(['student_id', 'is_read', 'created_at'], 'idx_student_read_created');
            $table->index(['type', 'created_at'], 'idx_type_created');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('notifications', function (Blueprint $table) {
            $table->dropIndex('idx_id_admin_student');
            $table->dropIndex('idx_admin_read_created');
            $table->dropIndex('idx_student_read_created');
            $table->dropIndex('idx_type_created');
        });
    }
};
