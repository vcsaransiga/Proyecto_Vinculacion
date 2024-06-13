<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StudentSeeder::class,
            // ClientSeeder::class,
            // AnalystSeeder::class,
            // InterviewSeeder::class,
            // ProjectSeeder::class,
            // TaskSeeder::class,
            // RolePermissionSeeder::class,
            // UserRoleSeeder::class,
        ]);
    }
}
