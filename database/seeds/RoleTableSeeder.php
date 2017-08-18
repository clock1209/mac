<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* CREATE NEW ROLE'S */
        $admin = new App\Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Administrator'; // optional
        $admin->description  = 'administrator permission'; // optional
        $admin->save();


        $agent = new App\Role();
        $agent->name         = 'agent';
        $agent->display_name = 'Agent'; // optional
        $agent->description  = 'agent permission'; // optional
        $agent->save();

        $Customer = new App\Role();
        $Customer->name         = 'customer';
        $Customer->display_name = 'Customer'; // optional
        $Customer->description  = 'Customer permission'; // optional
        $Customer->save();


        $Operations = new App\Role();
        $Operations->name         = 'operations';
        $Operations->display_name = 'Operations'; // optional
        $Operations->description  = 'Operations permission'; // optional
        $Operations->save();

        $Billing = new App\Role();
        $Billing->name         = 'billing';
        $Billing->display_name = 'Billing'; // optional
        $Billing->description  = 'billing permission'; // optional
        $Billing->save();


        /* CREATE NEW USER'S PERMISSION'S */
        $createUser = new App\Permission();
        $createUser->name 			= 'create_user';
        $createUser->display_name 	= 'Create User'; /*OPTIONAL*/
        $createUser->description 	= 'allows create users'; /*OPTIONAL*/
        $createUser->save();

        $editUser = new App\Permission();
        $editUser->name 			= 'edit_user';
        $editUser->display_name 	= 'Edit User'; /*OPTIONAL*/
        $editUser->description 	= 'allows edit users'; /*OPTIONAL*/
        $editUser->save();

        $seeUser = new App\Permission();
        $seeUser->name 			= 'see_user';
        $seeUser->display_name 	= 'See Users'; /*OPTIONAL*/
        $seeUser->description 	= 'allows see users'; /*OPTIONAL*/
        $seeUser->save();

        $deleteUser = new App\Permission();
        $deleteUser->name 			= 'delete_user';
        $deleteUser->display_name 	= 'Delete Users'; /*OPTIONAL*/
        $deleteUser->description 	= 'allows delete users'; /*OPTIONAL*/
        $deleteUser->save();


        /*
            ASSIGN PERMISSION'S
        */
        //TO ADMIN
        $agent->attachPermission($seeUser);

        $admin->attachPermission($createUser);
        $admin->attachPermission($editUser);
        $admin->attachPermission($seeUser);
        $admin->attachPermission($deleteUser);

        $user = User::find(1);
        $user->attachRole($admin);
    }
}
