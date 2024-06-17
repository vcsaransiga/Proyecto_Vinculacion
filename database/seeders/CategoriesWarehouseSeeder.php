<?php

namespace Database\Seeders;

use App\Models\CategoriesWarehouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesWarehouseSeeder extends Seeder
{
    public function run()
    {
        // CategoriesWarehouse::factory()->count(10)->create();

        DB::table('categories_warehouse')->insert([
            [
                'id_catware' => 'CATWAR-01',
                'name' => 'Almacen 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_catware' => 'CATWAR-02',
                'name' => 'Almacen 2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_catware' => 'CATWAR-03',
                'name' => 'Almacen 3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_catware' => 'CATWAR-04',
                'name' => 'Almacen 4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_catware' => 'CATWAR-05',
                'name' => 'Almacen 5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
