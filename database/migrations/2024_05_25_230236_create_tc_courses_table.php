<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tc_courses', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->float('code')->nullable();
            $table->text('description')->nullable();
            $table->string('course_type')->nullable();
            NestedSet::columns($table);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tc_courses');
    }
};
