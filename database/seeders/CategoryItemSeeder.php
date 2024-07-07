<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryItem;

class CategoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CategoryItem::factory()->count(20)->create();

        $categories = [
            ['id_catitem' => 'CAT-001', 'name' => 'Fertilizantes', 'description' => 'Sustancias químicas y orgánicas que mejoran el crecimiento de las plantas.'],
            ['id_catitem' => 'CAT-002', 'name' => 'Semillas', 'description' => 'Varios tipos de semillas para plantar cultivos.'],
            ['id_catitem' => 'CAT-003', 'name' => 'Pesticidas', 'description' => 'Sustancias utilizadas para prevenir, destruir o controlar plagas.'],
            ['id_catitem' => 'CAT-004', 'name' => 'Alimentos para Animales', 'description' => 'Alimentos destinados a los animales de granja.'],
            ['id_catitem' => 'CAT-005', 'name' => 'Suministros Veterinarios', 'description' => 'Medicamentos y otros suministros utilizados para el cuidado de la salud animal.'],
            ['id_catitem' => 'CAT-006', 'name' => 'Herramientas Agrícolas', 'description' => 'Varias herramientas utilizadas en la agricultura, como azadas, rastrillos, etc.'],
            ['id_catitem' => 'CAT-007', 'name' => 'Equipos de Riego', 'description' => 'Equipos utilizados para el riego de cultivos.'],
            ['id_catitem' => 'CAT-008', 'name' => 'Productos Lácteos', 'description' => 'Productos derivados de la leche producida por el ganado.'],
            ['id_catitem' => 'CAT-009', 'name' => 'Productos Cárnicos', 'description' => 'Varios tipos de carne obtenidos del ganado.'],
            ['id_catitem' => 'CAT-010', 'name' => 'Productos para la Protección de Plantas', 'description' => 'Productos utilizados para proteger las plantas de enfermedades y plagas.'],
        ];

        foreach ($categories as $category) {
            CategoryItem::create($category);
        }
    }
}
