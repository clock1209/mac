<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuffUnstuffCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('stuffs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('concepts');
          $table->string('cost');
          $table->string('type');
          $table->string('agreed_cost');
          $table->char('status',1)->default(1);
          $table->float('currency', 8, 2);
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
        //
        Schema::dropIfExists('stuffs');
    }
}
