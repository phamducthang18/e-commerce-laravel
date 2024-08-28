<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(20)->create()->each(function ($user) {
            // Lấy một vai trò ngẫu nhiên
            $role = Role::inRandomOrder()->first();

            // Gán vai trò cho người dùng
            $user->assignRole($role);
        });
    }
}
