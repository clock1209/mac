<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullablesToShippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
             ALTER TABLE `shippers` 
                    MODIFY `name` varchar(255) null,
                    MODIFY `email` varchar(255) null,
                    MODIFY `phone` varchar(255) null,
                    MODIFY `business_name` varchar(255) null,
                    MODIFY `street` varchar(255) null,
                    MODIFY `street_number` varchar(255) null,
                    MODIFY `neighborhood` varchar(255) null,
                    MODIFY `city` varchar(255) null,
                    MODIFY `country` varchar(255) null,
                    MODIFY `zip_code` varchar(255) null,
                    MODIFY `rfc_taxid` varchar(255) null;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shippers', function (Blueprint $table) {
            //
        });
    }
}
