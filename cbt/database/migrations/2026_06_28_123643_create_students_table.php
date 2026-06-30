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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('course_name');
            $table->string('award_in_view');
            $table->string('matric_no')->nullable();
            $table->string('level');
            $table->string('academic_session');
            $table->string('name_of_applicant');
            $table->string('state');
            $table->string('lga');
            $table->string('gender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
