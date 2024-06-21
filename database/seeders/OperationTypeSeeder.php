<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('operations_type')->insert([
            ['name' => 'Entrada', 'mov_type' => 'IN'],
            ['name' => 'Salida', 'mov_type' => 'OUT'],
            ['name' => 'Transferencia', 'mov_type' => 'TRANSFER'],
            ['name' => 'Ajuste', 'mov_type' => 'ADJUST'],
        ]);
    }
}
