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
        Schema::create('tc_exams', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('name');
            $table->string('full_mark')->nullable();
            $table->string('success_mark')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('duration')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_exams');
    }
};
