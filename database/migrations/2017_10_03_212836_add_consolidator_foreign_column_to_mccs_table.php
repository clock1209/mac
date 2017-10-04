<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConsolidatorForeignColumnToMccsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mccs', function (Blueprint $table) {
            $table->integer('consolidator_id')->unsigned()->nullable()->after('status');
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
        Schema::table('mccs', function (Blueprint $table) {
            $table->dropForeign(['consolidator_id']);
            $table->dropColumn(['consolidator_id']);
        });
    }
}
