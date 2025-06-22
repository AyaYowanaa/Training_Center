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
        Schema::table('tc_students', function (Blueprint $table) {
            $table->string('user_name')->nullable(); 
            $table->string('password')->nullable(); // 123456
        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tc_students', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->dropColumn('user_name'); 
        });
       
    }

};
