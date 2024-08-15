<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create raffles']);
        Permission::create(['name' => 'read raffles']);
        Permission::create(['name' => 'update raffles']);
        Permission::create(['name' => 'delete raffles']);

        Permission::create(['name' => 'create tickets']);
        Permission::create(['name' => 'read tickets']);
        Permission::create(['name' => 'update tickets']);
        Permission::create(['name' => 'delete tickets']);

        Permission::create(['name' => 'create payments']);
        Permission::create(['name' => 'read payments']);
        Permission::create(['name' => 'update payments']);
        Permission::create(['name' => 'delete payments']);

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        //todo permisos super admin
        $superAdmin = Role::create(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        //todo permisos admin
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([
            'create raffles',
            'read raffles',
            'update raffles',
            'delete raffles',
            'create tickets',
            'read tickets',
            'update tickets',
            'delete tickets',
            'create payments',
            'read payments',
            'update payments',
            'delete payments',
            'create users',
            'read users',
            'update users'
        ]);

        //todo permisos moderador
        $moderator = Role::create(['name' => 'moderator']);
        $moderator->givePermissionTo([
            'create tickets',
            'read tickets',
            'update tickets',
            'create payments',
            'read payments',
            'update payments',
        ]);

        //todo permisos user (usuario registrado)
        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo([
            'create tickets',
            'read tickets',
            'create payments',
            'read payments',
        ]);

        //todo permisos user public (usuario no registrado)
        $publicUser = Role::create(['name' => 'public-user']);
        $publicUser->givePermissionTo([
            'create tickets',
            'read tickets',
            'update tickets',
            'create payments',
            'read payments',
            'update payments',
        ]);
    }
}
