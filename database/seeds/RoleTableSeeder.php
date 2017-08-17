<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();


        factory(\App\Role::class)->create([
            'rolename' => 'administrator',
            'description' => 'rol administrator',
        ]);
        factory(Role::class)->create([
            'rolename' => 'Agent',
            'description' => 'rol Agent',
        ]);
        factory(Role::class)->create([
            'rolename' => 'Customer',
            'description' => 'rol Customer',
        ]);
        factory(Role::class)->create([
            'rolename' => 'Operations',
            'description' => 'rol Operations',
        ]);
        factory(Role::class)->create([
            'rolename' => 'Billing',
            'description' => 'rol Billing',
        ]);
    }
}
