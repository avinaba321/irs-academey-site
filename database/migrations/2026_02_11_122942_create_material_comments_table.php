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
        Schema::create('material_comments', function (Blueprint $table) {
            $table->id();

            // 🔗 Relation to Batch Material
            $table->foreignId('batch_material_id')
                  ->constrained()
                  ->onDelete('cascade');

            // 🔗 Relation to Student
            $table->foreignId('student_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->text('comment');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_comments');
    }
};
