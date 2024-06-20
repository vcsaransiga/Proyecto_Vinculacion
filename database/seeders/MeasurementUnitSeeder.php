<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['id_unit' => 'UNIT-01', 'name' => 'Metro', 'symbol' => 'm'],
            ['id_unit' => 'UNIT-02', 'name' => 'Kilogramo', 'symbol' => 'kg'],
            ['id_unit' => 'UNIT-03', 'name' => 'Litro', 'symbol' => 'L'],
            ['id_unit' => 'UNIT-04', 'name' => 'Centímetro', 'symbol' => 'cm'],
            ['id_unit' => 'UNIT-05', 'name' => 'Gramo', 'symbol' => 'g'],
        ];

        DB::table('measurement_units')->insert($units);
    }
}
