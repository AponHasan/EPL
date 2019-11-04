<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sales_promotions_title')->nullable();
            $table->string('sales_promotions_category')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->string('s_m_i_target_qty')->nullable();
            $table->string('s_m_i_qty')->nullable();
            $table->string('s_m_i_discount')->nullable();
            $table->string('s_m_tc_target_amount')->nullable();
            $table->string('s_m_tc_discount')->nullable();
            $table->string('s_m_a_status')->nullable();
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
        Schema::dropIfExists('sales_promotions');
    }
}
