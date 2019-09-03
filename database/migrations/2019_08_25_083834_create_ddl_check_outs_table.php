<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDdlCheckOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ddl_check_outs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->bigInteger('dealer_id')->nullable();
            $table->bigInteger('products_id')->nullable();
            $table->string('qty')->nullable();
            $table->date('approve_date')->nullable();
            $table->string('approve_qty')->nullable();
            $table->string('dealer_demand_no')->nullable();
            $table->string('dealer_demand_check_out_no')->nullable();
            $table->string('dealer_demand_approve_status')->nullable();
            $table->string('dealer_demand_approve_status1')->nullable();
            $table->string('dealer_demand_approve_status2')->nullable();
            
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
        Schema::dropIfExists('ddl_check_outs');
    }
}
