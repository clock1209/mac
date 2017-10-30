<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrierPortsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {

       DB::statement('SET FOREIGN_KEY_CHECKS=0;');
       Schema::dropIfExists('carrierport');
       DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       Schema::create('carrier_ports', function (Blueprint $table) {
       $table->increments('id');
       $table->float('arbitraryone');
       $table->float('arbitrarytwo');
       $table->float('arbitrarythree');
       $table->float('sub_arbitrary_one');
       $table->float('sub_arbitrary_two');
       $table->float('sub_arbitrary_three');
       $table->string('departures');
       $table->string('tt');
       $table->string('rate');
       $table->integer('include_subagent')->default(0);
       $table->text('remarks')->nullable();
       $table->char('status',1)->default(1);
       $table->integer('country_port_id')->unsigned()->nullable();
       $table->foreign('country_port_id')->references('id')->on('country_ports');
       $table->integer('port_name_id')->unsigned()->nullable();
       $table->foreign('port_name_id')->references('id')->on('ports_name');
       $table->integer('pricecal_id')->unsigned()->nullable();
       $table->foreign('pricecal_id')->references('id')->on('pricecal');
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
       Schema::table('carrier_ports', function (Blueprint $table) {
         //carrierport_portname_id_foreign
           $table->dropForeign(['country_ports_id']);
           $table->dropColumn(['country_ports_id']);

           $table->integer('portname_id')->unsigned()->nullable();
           $table->foreign('portname_id')->references('id')->on('portsname');

       });

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
}
