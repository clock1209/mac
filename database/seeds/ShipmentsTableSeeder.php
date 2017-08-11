<?php

use Illuminate\Database\Seeder;

class ShipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('shipments')->truncate();
        Schema::enableForeignKeyConstraints();

        factory(App\Shipment::class, 1)->create();
    }
}
