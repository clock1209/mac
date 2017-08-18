<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tradename');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('business_name');
            $table->string('street');
            $table->string('street_number');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('country');
            $table->string('zip_code');
            $table->string('rfc_taxid');
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
        Schema::dropIfExists('shippers');
    }
}
