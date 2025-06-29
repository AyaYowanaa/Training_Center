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
        if (!Schema::hasTable('tc_diploma')) {
            Schema::create('tc_diploma', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->text('description')->nullable();
                $table->string('levels');
                $table->decimal('total_price', 10, 2);
                $table->enum('status', ['active', 'inactive']);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_diploma');
    }
};
