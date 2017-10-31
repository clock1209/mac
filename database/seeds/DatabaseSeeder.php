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
        $this->call(RoleTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CountryCodeTableSeeder::class);
        $this->call(SuppliersTableSeeder::class); //don't remove PIVOT
        $this->call(PriceTableSeeder::class);
        $this->call(PortsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
    }
}
