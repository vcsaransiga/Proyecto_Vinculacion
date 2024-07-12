<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\Module;
use App\Models\ModuleProject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModuleProject>
 */
class ModuleProjectFactory extends Factory
{
    protected $model = ModuleProject::class;

    public function definition()
    {
        return [
            'id_pro' => Project::inRandomOrder()->first()->id_pro,
            'id_mod' => Module::inRandomOrder()->first()->id_mod,
        ];
    }
}
