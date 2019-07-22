<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerSposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_spos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sop_name')->nullable();
            $table->string('sop_nid')->nullable();
            $table->string('sop_phone_number')->nullable();
            $table->string('sop_address')->nullable();
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
        Schema::dropIfExists('dealer_spos');
    }
}
