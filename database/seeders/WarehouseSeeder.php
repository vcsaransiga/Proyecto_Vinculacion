<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    public function run()
    {
        DB::table('warehouses')->insert([
            [
                'id_ware' => 'WARE-01',
                'id_catware' => 'CATWAR-01',
                'name' => 'Warehouse 1',
                'description' => 'Description for Warehouse 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ware' => 'WARE-02',
                'id_catware' => 'CATWAR-02',
                'name' => 'Warehouse 2',
                'description' => 'Description for Warehouse 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ware' => 'WARE-03',
                'id_catware' => 'CATWAR-03',
                'name' => 'Warehouse 3',
                'description' => 'Description for Warehouse 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ware' => 'WARE-04',
                'id_catware' => 'CATWAR-04',
                'name' => 'Warehouse 4',
                'description' => 'Description for Warehouse 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ware' => 'WARE-05',
                'id_catware' => 'CATWAR-05',
                'name' => 'Warehouse 5',
                'description' => 'Description for Warehouse 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
