<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnumOptionsToAdditionalChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE additional_charges MODIFY COLUMN charge ENUM('ETD', 'Gate in', 'ATD/On board', 'ETB')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('additional_charges', function (Blueprint $table) {
            //
        });
    }
}
