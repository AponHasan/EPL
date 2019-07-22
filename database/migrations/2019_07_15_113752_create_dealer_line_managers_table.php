<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerLineManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_line_managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lm_name')->nullable();
            $table->string('lm_nid')->nullable();
            $table->string('lm_phone_number')->nullable();
            $table->string('lm_address')->nullable();
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
        Schema::dropIfExists('dealer_line_managers');
    }
}
