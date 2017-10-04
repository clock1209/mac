<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConsolidatorForeignColumnToStuffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stuffs', function (Blueprint $table) {
            $table->integer('consolidator_id')->unsigned()->nullable()->after('currency');
            $table->foreign('consolidator_id')->references('id')->on('consolidators')
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
        Schema::table('stuffs', function (Blueprint $table) {
            $table->dropForeign(['consolidator_id']);
            $table->dropColumn(['consolidator_id']);
        });
    }
}
