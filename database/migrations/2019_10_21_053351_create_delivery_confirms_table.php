<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryConfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_confirms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('approve_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('delivery_quentity')->nullable();
            $table->string('delivery_status')->nullable();
            $table->bigInteger('dealer_id')->nullable();
            $table->bigInteger('products_id')->nullable();
            $table->string('dealer_demand_no')->nullable();
            $table->string('dealer_demand_check_out_no')->nullable();
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
        Schema::dropIfExists('delivery_confirms');
    }
}
