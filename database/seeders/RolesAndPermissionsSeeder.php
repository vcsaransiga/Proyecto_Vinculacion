<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'crear']);
        Permission::create(['name' => 'leer']);
        Permission::create(['name' => 'actualizar']);
        Permission::create(['name' => 'eliminar']);
        Permission::create(['name' => 'reportar']);
        Permission::create(['name' => 'ver auditorías']);

        // create roles and assign created permissions
        $roleAdmin = Role::create(['name' => 'administrador']);
        $roleAdmin->givePermissionTo(['crear', 'leer', 'actualizar', 'eliminar', 'reportar']);

        $roleAuditor = Role::create(['name' => 'auditor']);
        $roleAuditor->givePermissionTo(['leer', 'reportar', 'ver auditorías']);
    }
}
