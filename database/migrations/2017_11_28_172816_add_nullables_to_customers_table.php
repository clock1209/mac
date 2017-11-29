<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullablesToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
             ALTER TABLE `customers` 
                    MODIFY `business_name` varchar(255) null,
                    MODIFY `rfc` varchar(255) null,
                    MODIFY `phone` varchar(255) null,
                    MODIFY `street` varchar(255) null,
                    MODIFY `suburb` varchar(255) null,
                    MODIFY `country` varchar(255) null,
                    MODIFY `state` varchar(255) null,
                    MODIFY `countrycode` varchar(255) null,
                    MODIFY `zipcode` varchar(255) null,
                    MODIFY `email` varchar(255) null,
                    MODIFY `contact_name` varchar(255) null,
                    MODIFY `contact_job` varchar(255) null;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
