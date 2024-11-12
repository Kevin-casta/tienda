<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Admin
         $adminRole = new Role();
         $adminRole->name = 'Administrador';
         $adminRole->save();

         //Vendedor Role
         $vendedorRole = new Role();
         $vendedorRole->name = 'Vendedor';
         $vendedorRole->save();

         $VendedorPermissions = Permission::where('module', '=', 'Productos')
                                      ->get();

         foreach($VendedorPermissions as $permission) {

             $rolePermission = new RolePermission();
             $rolePermission->role_id = $vendedorRole->id;
             $rolePermission->permission_id = $permission->id;
             $rolePermission->save();
         }


         // Users

         $user = new User();
         $user->first_name = 'kevin';
         $user->last_name = 'castaño';
         $user->document = '12345678';
         $user->email = 'kevin@hotmail.com';
         $user->email_verified_at = now();
         $user->password = Hash::make('1234');
         $user->role_id = $adminRole->id;
         $user->save();

         $user = new User();
         $user->first_name = 'Juan';
         $user->last_name = 'garcia';
         $user->document = '2222';
         $user->email = 'juang@yopmail.com';
         $user->email_verified_at = now();
         $user->password = Hash::make('1234');
         $user->role_id = $vendedorRole->id;
         $user->save();

         $user = new User();
         $user->first_name = 'mateo';
         $user->last_name = 'lopera';
         $user->document = '3333';
         $user->email = 'mateolop@yopmail.com';
         $user->email_verified_at = now();
         $user->password = Hash::make('1234');
         $user->role_id = $vendedorRole->id;
         $user->save();
     }

}
