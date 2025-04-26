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
        Schema::create('courses_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('courses_id');
            $table->unsignedInteger('expenses_id');
            $table->decimal('amount', 10, 2)->default(0);
            $table->timestamps();
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_fees');
    }
};
