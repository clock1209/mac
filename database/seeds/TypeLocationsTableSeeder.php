<?php

use Illuminate\Database\Seeder;

class TypeLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\TypeLocation::create([
            'name' => 'DELEGATION',
        ]);

        App\TypeLocation::create([
            'name' => 'PORT',
        ]);

        App\TypeLocation::create([
            'name' => 'TOWN',
        ]);
    }
}
