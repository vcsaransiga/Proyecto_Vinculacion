<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kardex;
use App\Models\OperationType;
use App\Models\Warehouse;
use App\Models\Project;
use App\Models\Item;

class KardexFactory extends Factory
{
    protected $model = Kardex::class;

    public function definition()
    {
        return [
            'id_kardex' => $this->faker->unique()->regexify('KARDEX-[0-9]{4}'),
            'id_ope' => OperationType::all()->random()->id_ope,
            'id_ware' => Warehouse::all()->random()->id_ware,
            'id_pro' => Project::all()->random()->id_pro,
            'id_item' => Item::all()->random()->id_item,
            'detail' => $this->faker->sentence,
            'date' => $this->faker->date(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'balance' => $this->faker->numberBetween(1, 100),
        ];
    }
}
