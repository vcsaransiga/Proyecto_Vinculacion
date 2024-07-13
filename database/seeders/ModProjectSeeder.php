<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Module;
use App\Models\ModuleProject;


class ModProjectSeeder extends Seeder
{

     public function run()
     {
         $projects = Project::all();
         $modules = Module::all();
         $combinations = [];
         $totalCombinations = 40; // Número total de combinaciones deseadas
 
         while (count($combinations) < $totalCombinations) {
             $project = $projects->random();
             $module = $modules->random();
 
             // Crear una combinación única
             $combination = [
                 'id_pro' => $project->id_pro,
                 'id_mod' => $module->id_mod
             ];
 
             // Asegurarse de no insertar duplicados
             if (!ModuleProject::where($combination)->exists() && !in_array($combination, $combinations)) {
                 ModuleProject::create($combination);
                 $combinations[] = $combination; // Marcar esta combinación como usada
             }
         }
     }
}
