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
        Schema::dropIfExists('tc_invoice_student');
        Schema::create('tc_invoice_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->nullable();
            $table->integer('courses_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->enum('payment_method',
             ['cash', 'bank transfer', 'credit card'])->nullable();
            $table->enum('status', ['completed', 'pending'])->default('pending');
            $table->string('date')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_invoice_student');
    }
};
