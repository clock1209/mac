<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('suppliers')->truncate();
        Schema::enableForeignKeyConstraints();

//        factory(App\Supplier::class, 5)->create();
        App\Supplier::create([
            'id'            => 0,
            'abbreviation'  => 'pivot(dont delete)',
            'type'          => 'Co Loader',
            'name'          => 'pivot(dont delete)'
        ]);
    }
}
