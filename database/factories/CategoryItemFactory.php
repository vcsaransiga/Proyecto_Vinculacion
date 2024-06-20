<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CategoryItem;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryItem>
 */
class CategoryItemFactory extends Factory
{
    protected $model = CategoryItem::class;

    public function definition()
    {
        return [
            'id_catitem' => 'CATITEM-' . Str::padLeft($this->faker->unique()->numberBetween(1, 999), 2, '0'),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}
