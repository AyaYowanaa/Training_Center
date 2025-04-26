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
        Schema::dropIfExists('tc_trainers_files');
        Schema::create('tc_trainers_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('trainer_id')->nullable();
            $table->text('file')->nullable();
            $table->text('file_name')->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_trainers_files');
    }
};
