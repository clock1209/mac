<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicedToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiced_to', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('business_name', 100);
            $table->string('rfc', 50);
            $table->string('phone', 15);
            $table->string('street', 100);
            $table->string('outside_number')->nullable();
            $table->string('interior_number')->nullable();
            $table->string('suburb', 100)->nullable();;
            $table->string('city')->nullable();
            $table->string('state');
            $table->string('country');
            $table->integer('countrycode');
            $table->string('zipcode');
            $table->string('email');
            $table->string('contact_name');
            $table->string('contact_job');
            $table->char('status',1)->default(1);

            $table->integer('customer_id');
            $table->integer('state_id');
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
    }
}
