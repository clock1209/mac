<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('reference_number');
            $table->string('consignee');
            $table->string('shipper');
            $table->enum('type', ['FCL', 'LCL']);
            $table->enum('rate', ['Asia', 'Special']);
            $table->string('place_of_receipt');
            $table->string('pol');
            $table->string('pod');
            $table->string('final_destination');
            $table->string('po_number')->nullable();
            $table->string('fcl_container_20')->nullable();
            $table->string('fcl_container_40')->nullable();
            $table->string('fcl_container_40hc')->nullable();
            $table->enum('fcl_container_type', ['Dry cargo', 'Reffer', 'Open top']);
            $table->integer('lcl_package')->nullable();
            $table->float('lcl_weight', 8, 2)->nullable();
            $table->float('lcl_cbm', 8, 3)->nullable();
            $table->date('cargo_ready')->nullable();
            $table->enum('incoterm', [
                                                'EXW- Ex Works',
                                                'FCA- Free carrier',
                                                'FAS- Free Alongside ship',
                                                'FOB- Free on board',
                                                'CFR- Cost and freight',
                                                'CIF- Cost, insurance and freight',
                                                'CPT- Carriage paid to',
                                                'CIP- Carriage and insurance paid to',
                                                'DAT- Delivered at terminal',
                                                'DAP- Delivered at place',
                                                'DDP- Delivered duty paid'
                                            ]);

            $table->timestamps();
        });

        Schema::create('schedule_options', function (Blueprint $table) {
            $table->integer('shipment_id')->unsigned();

            $table->foreign('shipment_id')->references('id')->on('shipments')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('carrier');
            $table->string('vessel');
            $table->string('voyage');
            $table->date('etd');
            $table->date('departures');
            $table->date('eta');
            $table->date('ams_closing');
            $table->date('cy_closing');
            $table->float('fcl_cont_cost_20');
            $table->float('fcl_cont_cost_40');
            $table->float('fcl_cont_cost_40hc');
            $table->float('fcl_cont_cost_other');
            $table->float('lcl_tm3');
            $table->float('lcl_total');
            $table->float('fcl_inland_cost_20');
            $table->float('fcl_inland_cost_40');
            $table->float('fcl_inland_cost_40hc');
            $table->float('fcl_inland_cost_other');

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
        Schema::dropIfExists('schedule_options');
        Schema::dropIfExists('shipments');
    }
}
