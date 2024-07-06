<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Responsible;
use App\Models\Module;
use App\Models\Period;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    protected $model = Module::class;

    public function definition()
    {
        // $responsibleIds = Responsible::pluck('id_responsible')->toArray();
        $responsibles = Responsible::all();
        $periods = Period::all();


        return [
            'id_mod' => $this->faker->unique()->regexify('MOD-[0-9]{2}'),
            'id_responsible' => $responsibles->random()->id_responsible,
            'id_period' => $periods->random()->id_period,
            'name' => $this->faker->words(3, true),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'vinculation_hours' => $this->faker->numberBetween(10, 100),
            'status' => $this->faker->boolean,
        ];
    }
}
