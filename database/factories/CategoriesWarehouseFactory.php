<?php

// database/factories/CategoriesWarehouseFactory.php
namespace Database\Factories;

use App\Models\CategoriesWarehouse;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriesWarehouseFactory extends Factory
{
    protected $model = CategoriesWarehouse::class;

    public function definition()
    {
        return [
            'id_catware' => 'CATWAR-' . Str::random(5),
            'name' => $this->faker->word,
        ];
    }
}
