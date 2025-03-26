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
/******************************************************************* */
    if (!Schema::hasTable('hr_bonuses')) {  
    Schema::create('hr_bonuses', function(Blueprint $table) {
    $table->increments('id');
    $table->timestamps();
    $table->softDeletes();
    $table->integer('emp_id')->unsigned();
    $table->smallInteger('value')->default('0');
    $table->string('date_bonuses', 25);
    $table->string('date_bonuses_int', 25);
    $table->tinyInteger('month');
    $table->string('year', 4);
    $table->string('reason', 255);
});
}
/*********************************************************************** */
if (!Schema::hasTable('hr_deductions')) {
Schema::create('hr_deductions', function(Blueprint $table) {
    $table->increments('id');
    $table->timestamps();
    $table->softDeletes();
    $table->integer('emp_id')->unsigned()->nullable();
    $table->smallInteger('value')->default('0');
    $table->string('date_deductions', 25);
    $table->string('date_deductions_int', 25);
    $table->tinyInteger('month');
    $table->string('year', 4);
    $table->string('reason', 255);
});
}
/********************************************************************************* */
        if (!Schema::hasTable('hr_employee_files')) {
            Schema::create('hr_employee_files', function(Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->softDeletes();
                $table->integer('emp_id')->unsigned();
                $table->integer('type_file')->unsigned();
                $table->enum('status', array('active', 'notactive'));
                $table->text('file_path');
            });}
/*********************************************************************************** */ 
if (!Schema::hasTable('hr_employee_mony')) {
Schema::create('hr_employee_mony', function(Blueprint $table) {
    $table->increments('id');
    $table->timestamps();
    $table->softDeletes();
    $table->integer('emp_id')->unsigned();
    $table->integer('extra_type')->unsigned();
    $table->smallInteger('value')->default('1');
    $table->enum('status', array('active', 'notactive'));
});
} 
/*************************************************************************************** */
if (!Schema::hasTable('hr_employee')) {
Schema::create('hr_employee', function(Blueprint $table) {
    $table->increments('id');
    $table->integer('emp_code')->nullable();
    $table->timestamps();
    $table->softDeletes();
    $table->string('name', 255)->nullable();
    $table->string('national_id', 14)->nullable();
    $table->string('phone', 15)->nullable();
    $table->string('email', 100)->nullable();
    $table->string('birthday', 50)->nullable();
    $table->text('address')->nullable();
    $table->text('image')->nullable();
    $table->integer('social_status')->unsigned()->nullable();
    $table->integer('specialization')->unsigned()->nullable();
    $table->tinyInteger('experience_year')->nullable();
    $table->string('date_hired', 25)->nullable();
    $table->integer('type_contract')->unsigned()->nullable();
    $table->integer('job_title')->unsigned()->nullable();
    $table->tinyInteger('work_hour_day')->default('0');
    $table->tinyInteger('work_month_day')->default('0');
    $table->smallInteger('holiday_emergency')->default('0');
    $table->smallInteger('holiday_year')->default('0');
    $table->smallInteger('main_salary')->default('0');
});
}
/*************************************************************************************** */ 
if (!Schema::hasTable('hr_holiday_setting')) {
Schema::create('hr_holiday_setting', function(Blueprint $table) {
    $table->increments('id');
    $table->timestamps();
    $table->softDeletes();
    $table->text('title');
    $table->tinyInteger('num_days')->default('1');
    $table->enum('status', array('active', 'notactive'));
});
} 
/*************************************************************************************** */ 
if (!Schema::hasTable('hr_holidays')) {
    Schema::create('hr_holidays', function(Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->softDeletes();
        $table->integer('emp_id')->unsigned();
        $table->integer('type_holiday_fk')->unsigned();
        $table->smallInteger('num_days');
        $table->string('date_start', 25);
        $table->bigInteger('date_start_int');
        $table->string('date_end', 25);
        $table->bigInteger('date_end_int');
        $table->string('reason', 255);
        $table->enum('status', array('accept', 'refuse', 'pending'));
        $table->tinyInteger('month');
        $table->string('year', 4);
    });
}  
/*************************************************************************************** */ 
if (!Schema::hasTable('hr_loan')) {
    
		Schema::create('hr_loan', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('emp_id')->unsigned();
			$table->enum('loan_type',array('advance payment','loan'));
			$table->smallInteger('value')->default('0');
			$table->tinyInteger('installments_num')->default('1');
			$table->string('date_loan', 25);
			$table->string('date_loan_int', 25);
			$table->string('reason', 255);
			$table->enum('status', array('accept', 'refuse', 'pending', 'ended'))->default('pending');
			$table->tinyInteger('month');
			$table->string('year', 4);
			$table->string('date_deductions', 25);
			$table->string('date_deductions_int', 25);
		});
	} 
    /*************************************************************************************** */ 
    if (!Schema::hasTable('hr_mainsettings')) {
        Schema::create('hr_mainsettings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
}
/************************************************************************************* */
if (!Schema::hasTable('hr_main_setting')) {
    Schema::create('hr_main_setting', function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->softDeletes();
        $table->text('title');
        $table->string('type_code')->nullable();
        $table->unsignedInteger('type_id_fk');
        $table->enum('status', ['active', 'notactive']);
    });
    
}
/*************************************************************************************** */ 
if (!Schema::hasTable('hr_performance_report')) {
    Schema::create('hr_performance_report', function(Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->softDeletes();
        $table->integer('emp_id')->unsigned();
        $table->string('date_report', 25);
        $table->string('date_report_int', 25);
        $table->text('details');
    });
}
/*************************************************************************************** */ 
if (!Schema::hasTable('hr_permission')) {
    Schema::create('hr_permission', function(Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->softDeletes();
        $table->integer('emp_id')->unsigned();
        $table->string('start_permission', 20);
        $table->string('end_permission', 20);
        $table->string('period');
        $table->string('date_permission', 25);
        $table->string('date_permission_int', 25);
        $table->string('reason', 255);
        $table->enum('status', array('accept', 'refuse', 'pending'));
        $table->string('year', 4);
        $table->tinyInteger('month');
    });
}
/*************************************************************************************** */ 
if (!Schema::hasTable('hr_type_setting')) {
    Schema::create('hr_type_setting', function(Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->softDeletes();
        $table->text('title');
        $table->smallInteger('code')->unique();
    });
}

/**************************************************************************************** */
    }

    public function down(): void
    {

        Schema::dropIfExists('hr_loan');
        Schema::dropIfExists('hr_employee');
        Schema::dropIfExists('hr_employee_files');
        Schema::dropIfExists('hr_type_setting');
        Schema::dropIfExists('hr_permission');
        Schema::dropIfExists('hr_performance_report');
        Schema::dropIfExists('hr_mainsettings');
        Schema::dropIfExists('hr_main_setting');
        Schema::dropIfExists('hr_holidays');
        Schema::dropIfExists('hr_holiday_setting');
        Schema::dropIfExists('hr_employee_mony');
        Schema::dropIfExists('hr_deductions');
        Schema::dropIfExists('hr_bonuses');

    }
};
