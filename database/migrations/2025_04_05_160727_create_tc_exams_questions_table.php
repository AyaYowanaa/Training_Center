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
        Schema::create('tc_exams_questions', function (Blueprint $table) {
            $table->id();
            $table->string('q_text')->nullable();
            $table->string('q_answer')->nullable();
            $table->json('q_choices')->nullable();
            $table->string('mark')->nullable();
            $table->unsignedBigInteger('exam_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_exams_questions');
    }
};
