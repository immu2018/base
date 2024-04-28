<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);

        $permManageUsers = Permission::create(['name' => 'manage users']);
        $permManagePosts = Permission::create(['name' => 'manage posts']);
        $permEditProfile = Permission::create(['name' => 'edit profile']);

        $roleAdmin->givePermissionTo([$permManageUsers, $permManagePosts]);
        $roleEditor->givePermissionTo($permManagePosts);
        $roleUser->givePermissionTo($permEditProfile);
    }
}

