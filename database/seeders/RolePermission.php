<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'writer']);
        $edit_users = Permission::create(['name' => 'edit articles']);
        $admin->givePermissionTo($edit_users);
        $user  = \App\Models\User::find(5);
        $user->assignRole($admin);
    }
}
