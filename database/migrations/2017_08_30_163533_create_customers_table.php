<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('business_name');
            $table->string('rfc');
            $table->string('phone');
            $table->string('street');
            $table->string('outside_number')->nullable();
            $table->string('interior_number')->nullable();
            $table->string('suburb');
            $table->string('city')->nullable();
            $table->string('state');
            $table->string('country');
            $table->integer('countrycode');
            $table->string('zipcode');
            $table->string('email');
            $table->string('contact_name');
            $table->string('contact_job');
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
        Schema::dropIfExists('customers');
    }
}
