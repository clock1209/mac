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
        $admin->description  = 'administrator role'; // optional
        $admin->save();


        $agent = new App\Role();
        $agent->name         = 'agent';
        $agent->display_name = 'Agent'; // optional
        $agent->description  = 'agent role'; // optional
        $agent->save();

        $Customer = new App\Role();
        $Customer->name         = 'customer';
        $Customer->display_name = 'Customer'; // optional
        $Customer->description  = 'Customer role'; // optional
        $Customer->save();


        $Operations = new App\Role();
        $Operations->name         = 'operations';
        $Operations->display_name = 'Operations'; // optional
        $Operations->description  = 'Operations role'; // optional
        $Operations->save();

        $Billing = new App\Role();
        $Billing->name         = 'billing';
        $Billing->display_name = 'Billing'; // optional
        $Billing->description  = 'billing role'; // optional
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

        $seeAction = new App\Permission();
        $seeAction->name 			= 'see_actions';
        $seeAction->display_name 	= 'see Actions'; /*OPTIONAL*/
        $seeAction->description 	= 'see actions'; /*OPTIONAL*/
        $seeAction->save();

        /* CREATE NEW ROLE'S PERMISSION'S */
        $createRole = new App\Permission();
        $createRole->name 			= 'create_role';
        $createRole->display_name 	= 'Create Role'; /*OPTIONAL*/
        $createRole->description 	= 'Create new roles'; /*OPTIONAL*/
        $createRole->save();

        $editRole = new App\Permission();
        $editRole->name 			= 'edit_role';
        $editRole->display_name 	= 'Edit Role'; /*OPTIONAL*/
        $editRole->description 		= 'Edit existing roles'; /*OPTIONAL*/
        $editRole->save();

        $seeRole = new App\Permission();
        $seeRole->name 			= 'see_role';
        $seeRole->display_name 	= 'See Roles'; /*OPTIONAL*/
        $seeRole->description 	= 'View the list of registered roles'; /*OPTIONAL*/
        $seeRole->save();

        $deleteRole = new App\Permission();
        $deleteRole->name 			= 'delete_role';
        $deleteRole->display_name 	= 'Delete Role'; /*OPTIONAL*/
        $deleteRole->description 	= 'Allows you to delete a role'; /*OPTIONAL*/
        $deleteRole->save();

        $assignPermission = new App\Permission();
        $assignPermission->name 			= 'assign_permission';
        $assignPermission->display_name 	= 'Assign Permissions'; /*OPTIONAL*/
        $assignPermission->description 		= 'Allows assign permissions to existing roles'; /*OPTIONAL*/
        $assignPermission->save();


        $agent->attachPermission($seeAction);
        $Customer->attachPermission($seeAction);
        $Operations->attachPermission($seeAction);
        $Billing->attachPermission($seeAction);

        $admin->attachPermission($createUser);
        $admin->attachPermission($editUser);
        $admin->attachPermission($seeUser);
        $admin->attachPermission($deleteUser);
        $admin->attachPermission($createRole);
        $admin->attachPermission($editRole);
        $admin->attachPermission($seeRole);
        $admin->attachPermission($deleteRole);
        $admin->attachPermission($assignPermission);

        $user = User::find(1);
        $user->attachRole($admin);
    }
}
