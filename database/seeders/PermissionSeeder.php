<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    $permissions = [

        // Productos
        ['name' => 'showSections', 'description' => 'Ver Productos', 'module' => 'Productos'],
        ['name' => 'createSections', 'description' => 'Crear Productos', 'module' => 'Productos'],
        ['name' => 'updateSections', 'description' => 'Actualizar Productos', 'module' => 'Productos'],
        ['name' => 'deleteSections', 'description' => 'Eliminar Productos', 'module' => 'Productos'],


    ];

    foreach($permissions as $permission) {

        $tmpPermission = Permission::where('name', '=', $permission['name'])
                                ->where('module', '=', $permission['module'])
                                ->first();

        if (empty($tmpPermission)) {

            $newPermission = new Permission();
            $newPermission->name = $permission['name'];
            $newPermission->description = $permission['description'];
            $newPermission->module = $permission['module'];
            $newPermission->save();
        }
    }

}
