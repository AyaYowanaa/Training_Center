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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('bio')->nullable();
            $table->string('cv')->nullable();
            $table->json('courses_id')->nullable();
            $table->json('documents')->nullable();
            $table->string('passport_id')->nullable();
            $table->string('bank_info')->nullable();
            $table->text('evaluation')->nullable();
            $table->json('course_evaluations')->nullable();
            $table->float('average_grade')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
