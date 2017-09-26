<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('remarks', function (Blueprint $table) {
      $table->increments('id');
      $table->string('note')->nullable();
      $table->string('nameconditions')->nullable();
      $table->float('valuecondition')->nullable();
      $table->timestamps();
      });


      Schema::create('overweight', function (Blueprint $table) {
      $table->increments('id');
      $table->string('container');
      $table->float('rangeup');
      $table->float('rangeto');
      $table->float('cost');
      $table->string('currency');
      $table->char('status',1)->default(1);
      $table->timestamps();
      });

      Schema::create('subjectto', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('concept_id')->unsigned()->nullable();
      $table->foreign('concept_id')->references('id')->on('concepts');
      $table->float('cost');
      $table->char('status',1)->default(1);
      $table->timestamps();
      });

      Schema::create('inlandscharges', function (Blueprint $table) {
      $table->increments('id');
      $table->string('type')->nullable();
      $table->integer('dischargeport_id')->unsigned()->nullable();
      $table->foreign('dischargeport_id')->references('id')->on('portsname');
      $table->integer('delivery_id')->unsigned()->nullable();
      $table->foreign('delivery_id')->references('id')->on('portsname');
      $table->float('rangeup')->nullable();
      $table->float('rangeto')->nullable();
      $table->float('cost')->nullable();
      $table->string('container')->nullable();
      $table->string('currency')->nullable();
      $table->char('status',1)->default(1);
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
        Schema::dropIfExists('remarks');
    }
}
