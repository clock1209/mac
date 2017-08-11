<?php

use Illuminate\Database\Seeder;

class ScheduleOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('schedule_options')->truncate();
        Schema::enableForeignKeyConstraints();

        factory(App\ScheduleOption::class, 2)->create();
    }
}
