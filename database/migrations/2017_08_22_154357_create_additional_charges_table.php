<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concept');
            $table->string('collect_prepaid');
            $table->string('import_export');
            $table->double('amount', 15, 2);
            $table->string('currency');
            $table->date('last_updated');
            $table->enum('charge_type', ['BL', 'ETB', 'Container', 'Others']);
            $table->enum('charge', ['ETD', 'Gate in', 'ATD/On board']);
            $table->longText('notes');
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
        Schema::dropIfExists('additional_charges');
    }
}
