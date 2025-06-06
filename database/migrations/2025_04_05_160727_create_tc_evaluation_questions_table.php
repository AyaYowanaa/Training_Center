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
        Schema::create('tc_evaluation_questions', function (Blueprint $table) {
            $table->id();
            $table->string('q_text')->nullable();
            $table->unsignedBigInteger('evaluation_id')->nullable();
            $table->enum('q_type', ['MCQ','True_False','Text'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_evaluation_questions');
    }
};
