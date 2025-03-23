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

        if (!Schema::hasTable('countries')) {
            Schema::create('countries', function (Blueprint $table) {
                $table->id();
                $table->json('name')->nullable();
                $table->string('image', 255)->nullable();
                $table->tinyInteger('is_deleted')->default(0);
                $table->timestamps();
                $table->softDeletes();

            });
        }
/******************************************************************* */
        if (!Schema::hasTable('main_setting')) {
            Schema::create('main_setting', function (Blueprint $table) {
                $table->increments('id');

                $table->text('title');
                $table->integer('type_id_fk')->unsigned();
                $table->integer('type_code')->unsigned();
                $table->enum('status', array('active', 'notactive'));
                $table->timestamps();
                $table->softDeletes();
            });
        }
/*********************************************************************** */
        if (!Schema::hasTable('type_setting')) {
            Schema::create('type_setting', function (Blueprint $table) {
                $table->increments('id');
                $table->text('title');
                $table->smallInteger('code')->unique();
                $table->timestamps();
                $table->softDeletes();
            });
        }
/************************************************************************ */
if (!Schema::hasTable('city')) {
    Schema::create('city', function(Blueprint $table) {
        $table->increments('id');
        $table->string('city_name', 255)->nullable();
        $table->timestamps();
        $table->softDeletes();

    });
}

/***************************************************************************** */
if (!Schema::hasTable('district')) {
    Schema::create('district', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('city_id')->unsigned();
        $table->text('name')->nullable();
        $table->enum('status', array('active', 'notactive'))->defult('active');
        $table->timestamps();
        $table->softDeletes();

    });
}
/********************************************************************************* */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('main_setting');
        Schema::dropIfExists('type_setting');
        Schema::dropIfExists('city');
        Schema::dropIfExists('district');


    }
};
