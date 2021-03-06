<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        factory(App\User::class)->create([
            'email' => 'support@nuvemtecnologia.mx',
            'username' => 'admin',
            'password' => bcrypt('secret'),
        ]);

    }
}
