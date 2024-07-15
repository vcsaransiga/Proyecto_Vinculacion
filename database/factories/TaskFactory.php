<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{

    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('-1 year', '+1 year');
        $endDate = $this->faker->dateTimeBetween($startDate, '+1 year');

        return [
            'id_task' => $this->faker->unique()->regexify('TASK-[0-9]{4}'),
            'id_pro' => Project::inRandomOrder()->first()->id_pro,
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'hours' => $this->faker->randomFloat(2, 0, 10),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'percentage' => $this->faker->randomFloat(2, 0, 100),
            'status' => $this->faker->randomElement(['pending']),
        ];
    }
}
