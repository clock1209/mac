<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrierportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrierport', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('portname_id')->unsigned()->nullable();
        $table->foreign('portname_id')->references('id')->on('portsname');
        $table->float('arbitraryone');
        $table->float('arbitrarytwo');
        $table->float('arbitrarythree');
        $table->string('departures');
        $table->string('tt');
        $table->string('rate');
        $table->integer('include_subagent')->default(0);
        $table->text('remarks')->nullable();
        $table->integer('pricecal_id')->unsigned()->nullable();
        $table->foreign('pricecal_id')->references('id')->on('pricecal');
        $table->char('status',1)->default(1);
        $table->integer('carrier_id')->unsigned()->nullable();
        $table->foreign('carrier_id')->references('id')->on('carriers');
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
        Schema::dropIfExists('carrierport');
    }
}
