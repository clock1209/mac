<?php

use Illuminate\Database\Seeder;

class ShippersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('shippers')->truncate();
        Schema::enableForeignKeyConstraints();

        factory(App\Shipper::class, 15)->create();
    }
}
