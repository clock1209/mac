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
                $table->integer('country_ports_id')->unsigned()->nullable();
                $table->timestamps();
                $table->foreign('country_ports_id')->references('id')->on('country_ports')
                    ->onUpdate('cascade')->onDelete('cascade');
            });

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::dropIfExists('portsname');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
            $table->dropForeign('ports_name_country_port_id_foreign');
        });

        Schema::dropIfExists('ports_name');

        Schema::create('portsname', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        });
    }
}
