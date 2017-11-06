<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnFromPortsName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ports_name', function (Blueprint $table) {
            $table->integer('type_id')->unsigned()->nullable()->after('country_ports_id');
            $table->char('status',1)->default(1)->after('type_id');
            $table->foreign('type_id')->references('id')->on('type_of_locations')
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
        Schema::table('ports_name', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropColumn(['type_id']);
            $table->dropColumn(['status']);
        });
    }
}
