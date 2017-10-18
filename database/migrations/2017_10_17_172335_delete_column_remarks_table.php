<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumnRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('nameconditions', 'valuecondition')) {
            $table->dropColumn(['nameconditions', 'valuecondition']);
        }

        Schema::table('remarks', function (Blueprint $table) {
              $table->integer('status')->default(1)->after('carrier_id');
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
            $table->string('nameconditions')->nullable();
            $table->float('valuecondition')->nullable();
        });

        if (Schema::hasColumn('carrier_id')) {
            $table->dropColumn('carrier_id');
        }
    }
}
