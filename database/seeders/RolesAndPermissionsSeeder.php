<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User; // Import User model
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo các quyền cho hệ thống thương mại điện tử
        $permissions = [
            'view products',
            'create products',
            'edit products',
            'delete products',
            'manage orders',
            'manage users',
            'manage categories',
            'view reports',
            'manage settings',
        ];

        // Tạo các quyền
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Tạo các vai trò và gán quyền
        $roles = [
            'admin' => [
                'view products',
                'create products',
                'edit products',
                'delete products',
                'manage orders',
                'manage users',
                'manage categories',
                'view reports',
                'manage settings',
            ],
            'editor' => [
                'view products',
                'create products',
                'edit products',
                'manage categories',
            ],
            'customer' => [
                'view products',
                'manage orders',
            ],
        ];

        foreach ($roles as $role => $rolePermissions) {
            $roleModel = Role::create(['name' => $role, 'guard_name' => 'web']);
            $roleModel->givePermissionTo($rolePermissions);
        }

        // Tạo người dùng và gán vai trò
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Editor User',
                'email' => 'editor@example.com',
                'password' => Hash::make('password'),
                'role' => 'editor',
            ],
            [
                'name' => 'Customer User',
                'email' => 'customer@example.com',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);
            $user->assignRole($userData['role']); // Gán vai trò cho người dùng
        }
    }
}
