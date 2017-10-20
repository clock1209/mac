<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnChargeFromAdditionalChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `additional_charges` MODIFY charge varchar(191);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('additional_charges', function (Blueprint $table) {
            $table->enum('charge', ['ETD', 'Gate in', 'ATD/On board']);
        });
    }
}
