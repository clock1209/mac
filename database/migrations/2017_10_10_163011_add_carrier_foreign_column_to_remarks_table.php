<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarrierForeignColumnToRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('remarks', function (Blueprint $table) {
            $table->integer('carrier_id')->unsigned()->nullable()->after('valuecondition');
            $table->foreign('carrier_id')->references('id')->on('carriers')
            ->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remarks', function (Blueprint $table) {
            $table->dropForeign(['carrier_id']);
            $table->dropColumn(['carrier_id']);
        });
    }
}
