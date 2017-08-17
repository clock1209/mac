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

//        /* CREATE NEW ROLE'S PERMISSION'S */
//        $createRole = new App\Permission();
//        $createRole->name 			= 'create_role';
//        $createRole->display_name 	= 'Crear Rol'; /*OPTIONAL*/
//        $createRole->description 	= 'Permite crear nuevos roles'; /*OPTIONAL*/
//        $createRole->save();
//
//        $editRole = new App\Permission();
//        $editRole->name 			= 'edit_role';
//        $editRole->display_name 	= 'Editar Rol'; /*OPTIONAL*/
//        $editRole->description 		= 'Permite editar roles existentes'; /*OPTIONAL*/
//        $editRole->save();
//
//        $seeRole = new App\Permission();
//        $seeRole->name 			= 'see_role';
//        $seeRole->display_name 	= 'Ver lista de Roles'; /*OPTIONAL*/
//        $seeRole->description 	= 'Permite ver la lista de roles registrados'; /*OPTIONAL*/
//        $seeRole->save();
//
//        $deleteRole = new App\Permission();
//        $deleteRole->name 			= 'delete_role';
//        $deleteRole->display_name 	= 'Baja de Rol'; /*OPTIONAL*/
//        $deleteRole->description 	= 'Permite dar de baja roles'; /*OPTIONAL*/
//        $deleteRole->save();
//
//        $assignPermission = new App\Permission();
//        $assignPermission->name 			= 'assign_permission';
//        $assignPermission->display_name 	= 'Asignar Permisos'; /*OPTIONAL*/
//        $assignPermission->description 		= 'Permite asignar permisos a los roles existentes'; /*OPTIONAL*/
//        $assignPermission->save();
//
//        /* CREATE NEW MOTIVE'S PERMISSION'S */
//        $createMotive = new App\Permission();
//        $createMotive->name 			= 'create_motive';
//        $createMotive->display_name 	= 'Crear Motivo'; /*OPTIONAL*/
//        $createMotive->description 	= 'Permite crear nuevos Motivos'; /*OPTIONAL*/
//        $createMotive->save();
//
//        $editMotive = new App\Permission();
//        $editMotive->name 			= 'edit_motive';
//        $editMotive->display_name 	= 'Editar Motivo'; /*OPTIONAL*/
//        $editMotive->description 	= 'Permite editar motivos existentes'; /*OPTIONAL*/
//        $editMotive->save();
//
//        $seeMotive = new App\Permission();
//        $seeMotive->name 			= 'see_motive';
//        $seeMotive->display_name 	= 'Ver lista de Motivos'; /*OPTIONAL*/
//        $seeMotive->description 	= 'Permite ver la lista de motivos registrados'; /*OPTIONAL*/
//        $seeMotive->save();
//
//        $deleteMotive = new App\Permission();
//        $deleteMotive->name 			= 'delete_motive';
//        $deleteMotive->display_name 	= 'Baja de Motivo'; /*OPTIONAL*/
//        $deleteMotive->description 		= 'Permite dar de baja motivos'; /*OPTIONAL*/
//        $deleteMotive->save();
//
//        /* CREATE NEW webSUPPORT'S PERMISSION'S */
//        $createWebSupport = new App\Permission();
//        $createWebSupport->name 			= 'create_websupport';
//        $createWebSupport->display_name 	= 'Crear Soporte'; /*OPTIONAL*/
//        $createWebSupport->description 		= 'Permite crear nuevos soportes'; /*OPTIONAL*/
//        $createWebSupport->save();
//
//        $editWebSupport = new App\Permission();
//        $editWebSupport->name 			= 'edit_websupport';
//        $editWebSupport->display_name 	= 'Editar Soporte'; /*OPTIONAL*/
//        $editWebSupport->description 	= 'Permite editar soportes existentes'; /*OPTIONAL*/
//        $editWebSupport->save();
//
//        $seeWebSupport = new App\Permission();
//        $seeWebSupport->name 			= 'see_websupport';
//        $seeWebSupport->display_name 	= 'Ver lista de Soportes'; /*OPTIONAL*/
//        $seeWebSupport->description 	= 'Permite ver la lista de soportes registrados'; /*OPTIONAL*/
//        $seeWebSupport->save();
//
//        $deleteWebSupport = new App\Permission();
//        $deleteWebSupport->name 			= 'delete_websupport';
//        $deleteWebSupport->display_name 	= 'Baja de Soporte'; /*OPTIONAL*/
//        $deleteWebSupport->description 		= 'Permite dar de baja soportes'; /*OPTIONAL*/
//        $deleteWebSupport->save();

        /*
            ASSIGN PERMISSION'S
        */
        //TO ADMIN
        $agent->attachPermission($seeUser);
//        $normalUser->attachPermission($seeRole);
//        $normalUser->attachPermission($seeMotive);

        $admin->attachPermission($createUser);
        $admin->attachPermission($editUser);
        $admin->attachPermission($seeUser);
        $admin->attachPermission($deleteUser);
//        $admin->attachPermission($createRole);
//        $admin->attachPermission($editRole);
//        $admin->attachPermission($seeRole);
//        $admin->attachPermission($deleteRole);
//        $admin->attachPermission($createMotive);
//        $admin->attachPermission($editMotive);
//        $admin->attachPermission($seeMotive);
//        $admin->attachPermission($deleteMotive);
//        $admin->attachPermission($assignPermission);
//        $admin->attachPermission($createWebSupport);
//        $admin->attachPermission($editWebSupport);
//        $admin->attachPermission($seeWebSupport);
//        $admin->attachPermission($deleteWebSupport);

//        for ($i = 1; $i <= 3; $i ++){
//            $user = User::find($i);
//            $user->attachRole($admin);
//        }

        $user = User::find(1);
        $user->attachRole($admin);
    }
}
