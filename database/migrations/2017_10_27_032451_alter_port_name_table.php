<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPortNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ports_name')) {

            Schema::create('ports_name', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('code')->nullable();
                $table->string('port_code')->nullable();
                $table->string('port_name')->nullable();
                $table->integer('countries_ports_id')->unsigned()->nullable();
                $table->timestamps();
                $table->foreign('countries_ports_id')->references('id')->on('countries_ports')
                    ->onUpdate('cascade')->onDelete('cascade');
            });

            Schema::dropIfExists('portsname');

        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ports_name', function($table)
        {
            $table->dropForeign('ports_name_countries_port_id_foreign');
        });

        Schema::dropIfExists('ports_name');

        Schema::create('portsname', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        });
    }
}
