<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\Responsible;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'id_pro' => $this->faker->unique()->regexify('PROJ-[0-9]{4}'),
            'id_responsible' => Responsible::factory(),
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['Active', 'Inactive', 'Completed']),
            'progress' => $this->faker->randomFloat(2, 0, 100),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'budget' => $this->faker->randomFloat(2, 1000, 100000),
        ];
    }
}
