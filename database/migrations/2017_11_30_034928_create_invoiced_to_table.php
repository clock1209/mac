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
            $table->string('business_name', 100)->nullable();
            $table->string('rfc', 50)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('street', 100)->nullable();
            $table->string('outside_number')->nullable();
            $table->string('interior_number')->nullable();
            $table->string('suburb', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('country_code', 100)->nullable();
            $table->string('zip_code', 100)->nullable();
            $table->string('email')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_job')->nullable();
            $table->char('status',1)->default(1);

            $table->integer('customer_id')->unsigned();
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
