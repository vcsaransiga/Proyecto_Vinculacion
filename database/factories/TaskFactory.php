<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_task' => $this->faker->unique()->regexify('TASK-[0-9]{4}'),
            'id_pro' => Project::factory(),
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'hours' => $this->faker->randomFloat(2, 1, 100),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'percentage' => $this->faker->randomFloat(2, 1, 20), // Ajusta según sea necesario
            'status' => 'pending',
        ];
    }
}
