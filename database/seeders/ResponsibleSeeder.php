<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Responsible;

class ResponsibleSeeder extends Seeder
{
    public function run()
    {
        Responsible::factory()->count(20)->create();
    }
}
