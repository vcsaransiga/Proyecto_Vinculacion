<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userDiego = User::where('email', 'diegodavidrecalde@gmail.com')->first();
        $userDiego->assignRole('administrador', 'auditor');

        $userAlejo = User::where('email', 'alejo@ueps.com')->first();
        $userAlejo->assignRole('administrador', 'auditor');


        $userZamyr = User::where('email', 'admin@ueps.com')->first();
        $userZamyr->assignRole('administrador', 'auditor');

        $userMelanie = User::where('email', 'melanierubi.mu@gmail.com')->first();
        $userMelanie->assignRole('administrador', 'auditor');

        $userAuditor = User::where('email', 'auditor@example.com')->first();
        $userAuditor->assignRole('auditor');
    }
}
