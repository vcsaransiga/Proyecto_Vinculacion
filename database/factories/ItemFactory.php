<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\CategoryItem;
use App\Models\MeasurementUnit;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'id_item' => $this->faker->unique()->regexify('ITEM-[0-9]{4}'),
            'id_catitem' => CategoryItem::all()->random()->id_catitem,
            'id_unit' => MeasurementUnit::all()->random()->id_unit,
            'id_pro' => Project::all()->random()->id_pro,
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence,
            'date' => $this->faker->date(),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }

    public function withTags()
    {
        return $this->afterCreating(function (Item $item) {
            $tags = $this->faker->words(3); // Genera 3 tags aleatorios
            $item->attachTags($tags);
        });
    }
}
