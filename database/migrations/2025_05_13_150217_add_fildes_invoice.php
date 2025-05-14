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
        Schema::table('tc_invoice_student', function (Blueprint $table) {
            $table->decimal('balance', 10, 2)->nullable();
            $table->decimal('remain_balance', 10, 2)->nullable();
            $table->integer('payment_method')->change();
            $table->enum('invoice_type', ['completed', 'credit'])->default('completed');
        });
        Schema::table('tc_invoice_entities', function (Blueprint $table) {
            $table->decimal('balance', 10, 2)->nullable();
            $table->decimal('remain_balance', 10, 2)->nullable();
            $table->integer('payment_method')->change();
            $table->enum('invoice_type', ['completed', 'credit'])->default('completed');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tc_invoice_student', function (Blueprint $table) {
            $table->dropColumn('balance');
            $table->dropColumn('remain_balance');
            $table->dropColumn('payment_method');
            $table->dropColumn('invoice_type');
        });
        Schema::table('tc_invoice_entities', function (Blueprint $table) {
            $table->dropColumn('balance');
            $table->dropColumn('remain_balance');
            $table->dropColumn('payment_method');
            $table->dropColumn('invoice_type');
        });
    }

};
