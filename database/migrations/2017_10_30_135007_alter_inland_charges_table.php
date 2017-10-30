<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterInlandChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('inlandscharges', 'inland_charges');

        Schema::table('inland_charges', function (Blueprint $table) {

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $table->dropForeign('inlandscharges_dischargeport_id_foreign');
            $table->dropForeign('inlandscharges_delivery_id_foreign');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $table->integer('discharge_country_ports_id')->unsigned()->nullable()->after('updated_at');
            $table->integer('delivery_country_ports_id')->unsigned()->nullable()->after('dischargeport_id');

            $table->foreign('dischargeport_id')->references('id')->on('ports_name')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('delivery_id')->references('id')->on('ports_name')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('discharge_country_ports_id')->references('id')->on('country_ports')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('delivery_country_ports_id')->references('id')->on('country_ports')
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::rename('inland_charges', 'inlandscharges');
        $table->dropForeign('delivery_country_ports_id');
        $table->dropForeign('discharge_country_ports_id');
        $table->dropColumn('delivery_country_ports_id');
        $table->dropColumn('discharge_country_ports_id');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $table->integer('delivery_id')->unsigned()->nullable()->after('updated_at');
        $table->integer('dischargeport_id')->unsigned()->nullable()->after('delivery_id');
        $table->foreign('dischargeport_id')->references('id')->on('ports_name')
            ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('delivery_id')->references('id')->on('ports_name')
            ->onUpdate('cascade')->onDelete('cascade');

    }
}
