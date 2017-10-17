<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemarksConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarks_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('free_demurrage')->nullable();
            $table->string('after_eta')->nullable();
            $table->string('eta_day')->nullable();
            $table->string('operation')->nullable();
            $table->float('price_day', 8, 2)->nullable();
            $table->integer('carrier_id')->unsigned()->nullable();
            $table->foreign('carrier_id')->references('id')->on('carriers')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('remarks_conditions');
    }
}
