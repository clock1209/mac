<?php

use Illuminate\Database\Seeder;

class PriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      App\Price::create([
          'name'          => 'ATD',
      ]);

      App\Price::create([
          'name'          => 'ETD',
      ]);

      App\Price::create([
          'name'          => 'ETB',
      ]);

      App\Price::create([
          'name'          => 'Gate in export',
      ]);


    }

}
