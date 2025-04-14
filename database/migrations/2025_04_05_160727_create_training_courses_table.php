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
        if (!Schema::hasTable('training_courses')) {

            Schema::create('training_courses', function (Blueprint $table) {
                $table->id();
                $table->text('title')->nullable();
                $table->text('details')->nullable();
                $table->text('date_at')->nullable();
                $table->integer('create_by')->nullable();
                $table->text('effort')->nullable();
                $table->string('from_date',30)->nullable();
                $table->string('to_date',30)->nullable();
                $table->string('duration')->nullable();
                $table->integer('location_id')->unsigned()->nullable();
                $table->decimal('fee', 19, 2)->nullable(); 
                $table->integer('courses_id')->unsigned()->nullable();
                $table->integer('capacity')->default(0)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_courses');
    }
};
