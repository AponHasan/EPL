<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncentivePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incentive_promos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sales_promotions_title')->nullable();
            $table->bigInteger('dealer_id')->nullable();
            $table->string('target_amount')->nullable();
            $table->string('achive_discount')->nullable();
            $table->string('fdate')->nullable();
            $table->string('tdate')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('incentive_promos');
    }
}





