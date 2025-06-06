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
        Schema::create('tc_evaluation', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('course_id')->nullable();
            //$table->string('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_evaluation');
    }
};
