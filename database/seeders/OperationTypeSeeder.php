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
            ['name' => 'Entrada Transferencia', 'mov_type' => 'IN_TRANSFER'],
            ['name' => 'Salida Transferencia', 'mov_type' => 'OUT_TRANSFER'],
        ]);
    }
}
