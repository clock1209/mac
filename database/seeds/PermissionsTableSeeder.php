<?php

use Illuminate\Database\Seeder;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Schema::disableForeignKeyConstraints();
      DB::table('permissions')->truncate();
      $idRole = \App\Role::where('name', 'admin')->value('id');
      DB::table('permission_role')->where('role_id', $idRole)->delete();
      Schema::enableForeignKeyConstraints();

      $allpermissions= DB::table('permissions')->insert([

          /* CREATE NEW USER'S PERMISSION'S */
          [
              'name'			=> 'create_user',
              'display_name' 	=> 'Create User',
              'description' 	=> 'allows create users',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_user',
              'display_name' 	=> 'Edit User',
              'description' 	=> 'allows edit users',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_user',
              'display_name' 	=> 'See Users',
              'description' 	=> 'allows see users',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_user',
              'display_name' 	=> 'Delete Users',
              'description' 	=> 'allows delete users',
              'created_at'    => date('Y-m-d H:i:s'),
          ],
          [
              'name'			=> 'see_actions',
              'display_name' 	=> 'see Actions',
              'description' 	=> 'see actions',
              'created_at'    => date('Y-m-d H:i:s'),
          ],

          /* CREATE NEW ROLE'S PERMISSION'S */
          [
              'name'			=> 'create_role',
              'display_name' 	=> 'Create Rol',
              'description' 	=> 'Create new roles',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_role',
              'display_name' 	=> 'Edit Role',
              'description' 	=> 'Edit existing roles',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_role',
              'display_name' 	=> 'See Roles',
              'description' 	=> 'View the list of registered roles',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_role',
              'display_name' 	=> 'Delete Role',
              'description' 	=> 'Allows you to delete a role',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'assign_permission',
              'display_name' 	=> 'Assign Permissions',
              'description' 	=> 'Allows assign permissions to existing roles',
              'created_at'    => date('Y-m-d H:i:s'),
          ],

          /* CREATE NEW CUSTOMER'S PERMISSION'S */
          [
              'name'			=> 'create_customer',
              'display_name' 	=> 'Create Customer',
              'description' 	=> 'Create new customer',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_customer',
              'display_name' 	=> 'Edit Customer',
              'description' 	=> 'Edit existing customer',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_customer',
              'display_name' 	=> 'Delete Customer',
              'description' 	=> 'Allows you to delete a customer',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_customer',
              'display_name' 	=> 'See Customer',
              'description' 	=> 'View the list of registered Customer',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_docs',
              'display_name' 	=> 'See Docs',
              'description' 	=> 'View the list of registered Docs',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'create_shipper',
              'display_name' 	=> 'Create Shipper',
              'description' 	=> 'Create new Shipper',
              'created_at'    => date('Y-m-d H:i:s'),
          ],

          /* CREATE NEW SUPPLIER'S PERMISSION'S */
          [
              'name'			=> 'create_suppliers',
              'display_name' 	=> 'Create Supliers',
              'description' 	=> 'Create new suppliers',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_suppliers',
              'display_name' 	=> 'Edit Suppliers',
              'description' 	=> 'Edit existing suppliers',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_suppliers',
              'display_name' 	=> 'Delete Suppliers',
              'description' 	=> 'Allows you to delete a suppliers',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_suppliers',
              'display_name' 	=> 'See Suppliers',
              'description' 	=> 'View the list of registered suppliers',
              'created_at'    => date('Y-m-d H:i:s'),
          ],

          /* CREATE NEW CONCEPT'S PERMISSION'S */
          [
              'name'			=> 'create_concepts',
              'display_name' 	=> 'Create Concepts',
              'description' 	=> 'Create new concept',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_concepts',
              'display_name' 	=> 'Edit Concepts',
              'description' 	=> 'Edit existing concepts',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_concepts',
              'display_name' 	=> 'Delete Concepts',
              'description' 	=> 'Allows you to delete a concepts',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_concepts',
              'display_name' 	=> 'See Concepts',
              'description' 	=> 'View the list of registered concepts',
              'created_at'    => date('Y-m-d H:i:s'),
          ],

          /* CREATE NEW CONSOLIDATOR'S PERMISSION'S */
          [
              'name'			=> 'create_consolidators',
              'display_name' 	=> 'Create Consolidators',
              'description' 	=> 'Create new consolidators',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_consolidators',
              'display_name' 	=> 'Edit Consolidators',
              'description' 	=> 'Edit existing consolidators',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_consolidators',
              'display_name' 	=> 'Delete Consolidators',
              'description' 	=> 'Allows you to delete a consolidators',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_consolidators',
              'display_name' 	=> 'See Consolidators',
              'description' 	=> 'View the list of registered consolidators',
              'created_at'    => date('Y-m-d H:i:s'),
          ],

          /* CREATE NEW STUFF'S AND UNSTUFF'S  PERMISSION'S */
          [
              'name'			=> 'create_stuff',
              'display_name' 	=> 'Create Stuff',
              'description' 	=> 'Create new Stuff',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_stuff',
              'display_name' 	=> 'Edit Stuff',
              'description' 	=> 'Edit existing Stuff',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_stuff',
              'display_name' 	=> 'Delete Stuff',
              'description' 	=> 'Allows you to delete a Stuff',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_stuff',
              'display_name' 	=> 'See Stuff',
              'description' 	=> 'View the list of registered Stuff',
              'created_at'    => date('Y-m-d H:i:s'),
          ],

          /* CREATE NEW STUFF'S AND UNSTUFF'S  PERMISSION'S */
          [
              'name'			=> 'create_mcc',
              'display_name' 	=> 'Create Mcc',
              'description' 	=> 'Create new Mcc',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_mcc',
              'display_name' 	=> 'Edit Mcc',
              'description' 	=> 'Edit existing Mcc',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_mcc',
              'display_name' 	=> 'Delete Mcc',
              'description' 	=> 'Allows you to delete a Mcc',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_mcc',
              'display_name' 	=> 'See Mcc',
              'description' 	=> 'View the list of registered Mcc',
              'created_at'    => date('Y-m-d H:i:s'),
          ],

          /* CREATE NEW CARRIER'S  PERMISSION'S */
          [
              'name'			=> 'create_carriers',
              'display_name' 	=> 'Create Carriers',
              'description' 	=> 'Create new Carriers',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_carriers',
              'display_name' 	=> 'Edit Carriers',
              'description' 	=> 'Edit existing Carriers',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_carriers',
              'display_name' 	=> 'Delete Carriers',
              'description' 	=> 'Allows you to delete a Carriers',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_carriers',
              'display_name' 	=> 'See Carriers',
              'description' 	=> 'View the list of registered Carriers',
              'created_at'    => date('Y-m-d H:i:s'),
          ],

          /* CREATE NEW CARRIER PORT'S  PERMISSION'S */
          [
              'name'			=> 'create_carrierports',
              'display_name' 	=> 'Create Carriers Ports',
              'description' 	=> 'Create new Carriers Ports',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_carrierports',
              'display_name' 	=> 'Edit Carriers Ports',
              'description' 	=> 'Edit existing Carriers Ports',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_carrierports',
              'display_name' 	=> 'Delete Carriers Ports',
              'description' 	=> 'Allows you to delete a Carriers Ports',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_carrierports',
              'display_name' 	=> 'See Carriers Ports',
              'description' 	=> 'View the list of registered Carriers Ports',
              'created_at'    => date('Y-m-d H:i:s'),
          ],

          /* CREATE NEW CARRIER PORT REMARKS PERMISSION'S */
          [
              'name'			=> 'create_carrierportsremarks',
              'display_name' 	=> 'Create Carriers Ports Remarks',
              'description' 	=> 'Create new Carriers Ports',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'edit_carrierportsremarks',
              'display_name' 	=> 'Edit Carriers Ports Remarks',
              'description' 	=> 'Edit existing Carriers Ports Remarks',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'delete_carrierportsremarks',
              'display_name' 	=> 'Delete Carriers Ports Remarks',
              'description' 	=> 'Allows you to delete a Carriers Ports Remarks',
              'created_at'    => date('Y-m-d H:i:s'),
          ],[
              'name'			=> 'see_carrierportsremarks',
              'display_name' 	=> 'See Carriers Ports Remarks',
              'description' 	=> 'View the list of registered Carriers Ports Remarks',
              'created_at'    => date('Y-m-d H:i:s'),
          ]

      ]);

         $adminRole = \App\Role::where('name', 'admin')->first();

         $adminRole->attachPermissions(\App\Permission::all());


    }
}
