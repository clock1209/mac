<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsFromCarrierportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carrierport', function (Blueprint $table) {
            $table->float('sub_arbitrary_one')->nullable()->after('include_subagent');
            $table->float('sub_arbitrary_two')->nullable()->after('sub_arbitrary_one');
            $table->float('sub_arbitrary_three')->nullable()->after('sub_arbitrary_two');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carrierport', function (Blueprint $table) {
          $table->dropColumn(['sub_arbitrary_one']);
          $table->dropColumn(['sub_arbitrary_two']);
          $table->dropColumn(['sub_arbitrary_three']);
        });
    }
}
