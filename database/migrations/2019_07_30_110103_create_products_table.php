<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name')->nullabble();
            $table->string('product_code')->nullabble();
            $table->string('product_dimension')->nullabble();
            $table->string('product_dimension_unit')->nullabble();
            $table->string('product_weight')->nullabble();
            $table->string('product_weight_unit')->nullabble();
            $table->string('product_barcode')->nullabble();
            $table->string('product_dp_price')->nullabble();
            $table->string('product_dealer_commision')->nullabble();
            $table->string('product_mrp')->nullabble();
            $table->string('product_color')->nullabble();
            $table->string('product_description')->nullabble();
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
        Schema::dropIfExists('products');
    }
}
