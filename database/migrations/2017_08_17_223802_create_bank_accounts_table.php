<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pay_of');
            $table->integer('account');
            $table->string('bank');
            $table->string('clabe');
            $table->integer('aba');
            $table->string('swift');
            $table->string('reference');
            $table->string('currency');
            $table->string('beneficiary');
            $table->char('status',1)->default(1);
            $table->integer('supplier_id')->unsigned();

            $table->foreign('supplier_id')->references('id')->on('suppliers');
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
        Schema::dropIfExists('bank_accounts');
    }
}
