<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->char('other_id')->nullable()->default(0)->after('contact_job');
            $table->char('imo')->nullable()->default(0)->after('contact_job');
            $table->char('cy')->nullable()->default(0)->after('contact_job');
            $table->char('rail_ramp')->nullable()->default(0)->after('contact_job');
            $table->char('all_truck')->nullable()->default(0)->after('contact_job');
            $table->char('overweight')->nullable()->default(0)->after('contact_job');
            $table->char('logistic_cargo')->nullable()->default(0)->after('contact_job');
            $table->char('all_in_rate')->nullable()->default(0)->after('contact_job');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn([
                'all_in_rate',
                'logistic_cargo',
                'overweight',
                'all_truck',
                'rail_ramp',
                'cy',
                'imo',
                'other_id'
            ]);
        });
    }
}
