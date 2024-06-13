<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periods')->insert([
            [
                'name' => 'First Semester',
                'academic_year' => 2024,
                'start_date' => Carbon::create(2024, 1, 1),
                'end_date' => Carbon::create(2024, 6, 30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Second Semester',
                'academic_year' => 2024,
                'start_date' => Carbon::create(2024, 7, 1),
                'end_date' => Carbon::create(2024, 12, 31),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'First Semester',
                'academic_year' => 2025,
                'start_date' => Carbon::create(2025, 1, 1),
                'end_date' => Carbon::create(2025, 6, 30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Second Semester',
                'academic_year' => 2025,
                'start_date' => Carbon::create(2025, 7, 1),
                'end_date' => Carbon::create(2025, 12, 31),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Summer Session',
                'academic_year' => 2024,
                'start_date' => Carbon::create(2024, 6, 1),
                'end_date' => Carbon::create(2024, 8, 31),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
