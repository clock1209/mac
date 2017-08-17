<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('abbreviation');
            $table->enum('type', ['Co Loader', 'Carrier', 'Custom Broker', 'Truck Service', 'Werehouse',
                    'Port terminal', 'Insurence company', 'Agent']);
            $table->string('name');
            $table->char('status',1)->default(1);
            $table->timestamps();
        });

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
            $table->integer('suppliers_id')->unsigned();

            $table->foreign('suppliers_id')->references('id')->on('suppliers');
            $table->timestamps();
        });

        Schema::create('aditional_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concept');
            $table->string('collect_prepaid');
            $table->string('import_export');
            $table->string('amount');
            $table->string('currency');
            $table->string('charge_type');
            $table->string('charge');
            $table->longText('notes');
            $table->char('status',1)->default(1);
            $table->integer('suppliers_id')->unsigned();

            $table->foreign('suppliers_id')->references('id')->on('suppliers');
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('select_an_area');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->char('status',1)->default(1);
            $table->integer('suppliers_id')->unsigned();

            $table->foreign('suppliers_id')->references('id')->on('suppliers');
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
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('aditional_charges');
        Schema::dropIfExists('bank_accounts');
        Schema::dropIfExists('suppliers');
    }
}
