<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('d_s_name')->nullable();
            $table->biginteger('dlr_spo_id')->nullable();
            $table->biginteger('dlr_lm_id')->nullable();
            $table->biginteger('dlr_type_id')->nullable();
            $table->string('d_proprietor_name')->nullable();
            $table->string('d_s_code')->nullable();
            $table->string('dlr_code')->nullable();
            $table->date('dlr_op_date')->nullable();
            $table->string('dlr_op_month')->nullable();
            $table->string('dlr_police_station')->nullable();
            $table->string('dlr_address')->nullable();
            $table->biginteger('dlr_area_id')->nullable();
            $table->string('dlr_mobile_no')->nullable();
            $table->string('dlr_base')->nullable();
            $table->string('dlr_dsm')->nullable();
            $table->biginteger('dlr_zone_id')->nullable();
            $table->string('dlr_remark')->nullable();
            $table->string('dlr_tred_lisence')->nullable();
            $table->string('dlr_tin_number')->nullable();
            $table->string('dlr_active_status')->default(1);
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
        Schema::dropIfExists('dealers');
    }
}
