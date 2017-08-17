<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ShipmentsTableSeeder::class);
        $this->call(ScheduleOptionsTableSeeder::class);
        $this->call(ShippersTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
    }
}
