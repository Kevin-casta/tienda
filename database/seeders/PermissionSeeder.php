<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            // Productos
            ['name' => 'showSections', 'description' => 'Ver Productos', 'module' => 'Productos'],
            ['name' => 'createSections', 'description' => 'Crear Productos', 'module' => 'Productos'],
            ['name' => 'updateSections', 'description' => 'Actualizar Productos', 'module' => 'Productos'],
            ['name' => 'deleteSections', 'description' => 'Eliminar Productos', 'module' => 'Productos'],

            // Blogs
            ['name' => 'showBlogs', 'description' => 'Ver Blogs', 'module' => 'Blogs'],
            ['name' => 'createBlogs', 'description' => 'Crear Blogs', 'module' => 'Blogs'],
            ['name' => 'updateBlogs', 'description' => 'Actualizar Blogs', 'module' => 'Blogs'],
            ['name' => 'deleteBlogs', 'description' => 'Eliminar Blogs', 'module' => 'Blogs'],

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

}
