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
        Schema::create('tc_diploma_levels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diploma_id')->nullable();
            $table->string('level_name')->nullable();
            $table->string('duration')->nullable();
            $table->string('pass_mark')->nullable();
            $table->decimal('level_price', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_diploma_levels');
    }
};
