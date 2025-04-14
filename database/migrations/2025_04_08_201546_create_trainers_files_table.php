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
        Schema::create('trainers_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('trainer_id')->nullable();           
            $table->text('cv')->nullable();
            $table->text('bio')->nullable();
            $table->json('documents')->nullable();
            $table->string('passport_id')->nullable();
            $table->string('bank_info')->nullable();

           
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers_files');
    }
};
