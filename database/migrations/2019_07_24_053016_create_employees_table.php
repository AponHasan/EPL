<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_code')->nullable();
            $table->string('emp_punch_card_no')->nullable();
            $table->string('emp_name')->nullable();
            $table->date('emp_dob')->nullable();
            $table->bigInteger('emp_designation_id')->nullable();
            $table->string('emp_gender')->nullable();
            $table->string('emp_merital_status')->nullable();
            $table->string('emp_nid_card')->nullable();
            $table->string('emp_mobile_number')->nullable();
            $table->string('emp_nationality')->nullable();
            $table->string('emp_religion')->nullable();
            $table->string('emp_present_address')->nullable();
            $table->string('emp_parmanent_address')->nullable();
            $table->string('emp_father_name')->nullable();
            $table->string('emp_mother_name')->nullable();
            $table->string('emp_spouse_name')->nullable();
            $table->string('emp_blood_group')->nullable();
            $table->date('emp_joining_date')->nullable();
            $table->bigInteger('emp_unit_id')->nullable();
            $table->bigInteger('emp_division_id')->nullable();
            $table->bigInteger('emp_department_id')->nullable();
            $table->bigInteger('emp_company_id')->nullable();
            $table->bigInteger('emp_secction_id')->nullable();
            $table->string('emp_staff_category_id')->nullable();
            $table->string('emp_grade_info')->nullable();            
            $table->string('emp_mail_id')->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
