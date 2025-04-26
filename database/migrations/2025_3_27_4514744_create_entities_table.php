<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


            if (!Schema::hasTable('tc_entities')) {

                Schema::create('tc_entities', function (Blueprint $table) {
                    $table->id();
                    $table->text('name')->nullable();
                    $table->string('email', 255)->nullable();
                    $table->text('address')->nullable();
                    $table->string('phone', 20)->nullable();
                    $table->timestamps();
                    $table->softDeletes();
                });
            }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tc_entities');
    }
};
