<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Responsible;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Project::factory()->count(6)->create();

        Project::create([
            'id_pro' => 'PROJ-0001',
            'id_responsible' => 'RESP-01',
            'name' => 'Porcinos',
            'description' => 'Proyecto de crianza de cerdos',
            'status' => 'Active',
            'progress' => 45.75,
            'start_date' => '2023-01-15',
            'end_date' => '2024-09-30',
            'budget' => 25000.00,
        ]);

        Project::create([
            'id_pro' => 'PROJ-002',
            'id_responsible' => 'RESP-03',
            'name' => 'Cuyes',
            'description' => 'Proyecto de crianza de cuyes',
            'status' => 'Active',
            'progress' => 30.00,
            'start_date' => '2023-06-01',
            'end_date' => '2024-05-31',
            'budget' => 50000.00,
        ]);

        Project::create([
            'id_pro' => 'PROJ-0003',
            'id_responsible' => 'RESP-04',
            'name' => 'Hortalizas',
            'description' => 'Proyecto de cultivo de hortalizas',
            'status' => 'Completed',
            'progress' => 100.00,
            'start_date' => '2022-02-20',
            'end_date' => '2023-11-20',
            'budget' => 30000.00,
        ]);

        Project::create([
            'id_pro' => 'PROJ-0004',
            'id_responsible' => 'RESP-02',
            'name' => 'Abonos',
            'description' => 'Proyecto de producción de abonos orgánicos',
            'status' => 'Inactive',
            'progress' => 10.50,
            'start_date' => '2023-09-01',
            'end_date' => '2025-03-01',
            'budget' => 80000.00,
        ]);

        Project::create([
            'id_pro' => 'PROJ-0005',
            'id_responsible' => 'RESP-05',
            'name' => 'Lacteos',
            'description' => 'Proyecto de producción de lácteos',
            'status' => 'Active',
            'progress' => 65.25,
            'start_date' => '2022-11-10',
            'end_date' => '2024-12-10',
            'budget' => 150000.00,
        ]);
    }
}
