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
        Schema::create('cbtsettings', function (Blueprint $table) {

            $table->id();

            // Unique Exam ID
            $table->string('exam_code')->unique();

            // Course assigned to a department/class
            $table->foreignId('coursedepartment_id')
                  ->constrained('coursedepartments')
                  ->cascadeOnDelete();

            // Exam Date
            $table->date('exam_date');

            // Exam Time
            $table->time('exam_time');

            // Duration in Minutes
            $table->integer('duration_minutes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cbtsettings');
    }
};