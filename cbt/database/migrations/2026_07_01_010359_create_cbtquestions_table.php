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
        Schema::create('cbtquestions', function (Blueprint $table) {

            $table->id();

            // Link to CBT Setting
            $table->foreignId('cbtsetting_id')
                  ->constrained('cbtsettings')
                  ->cascadeOnDelete();

            // Question
            $table->longText('question');

            // Options
            $table->text('option_a');
            $table->text('option_b');
            $table->text('option_c');
            $table->text('option_d');

            // Correct Answer
            $table->enum('answer', ['A', 'B', 'C', 'D']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cbtquestions');
    }
};