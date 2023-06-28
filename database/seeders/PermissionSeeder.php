<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = 1;
        $moderatorRole = 2;
        $financialRole = 3;

        $permissions = [
            ['id' => 1, 'name' => 'admin_access'],
            ['id' => 2, 'name' => 'admin_view'],
            ['id' => 3, 'name' => 'admin_create'],
            ['id' => 4, 'name' => 'admin_edit'],
            ['id' => 5, 'name' => 'admin_delete'],
            ['id' => 6, 'name' => 'product_access'],
            ['id' => 7, 'name' => 'product_view'],
            ['id' => 8, 'name' => 'product_create'],
            ['id' => 9, 'name' => 'product_edit'],
            ['id' => 10, 'name' => 'product_delete']
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        foreach (Permission::all() as $permission) {
            $permission->roles()->attach($adminRole);
        }

        $moderator = Role::find($moderatorRole);
        $moderator->permissions()->sync([6, 7]);

        $financial = Role::find($financialRole);
        $financial->permissions()->sync([6, 7, 8, 9, 10]);
    }
}
