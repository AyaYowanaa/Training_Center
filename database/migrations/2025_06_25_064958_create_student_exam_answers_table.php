<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tc_student_exam_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('tc_students');
            $table->foreignId('exam_id')->constrained('tc_exams');
            $table->foreignId('question_id')->constrained('tc_exams_questions');
            $table->text('answer');
            $table->boolean('is_correct')->default(false);
            $table->integer('degree')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_student_exam_answers');
    }
};
