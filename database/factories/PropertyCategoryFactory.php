<?php

namespace Database\Factories;

use App\Models\PropertyCategory;
use App\Models\Property;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyCategoryFactory extends Factory
{
    protected $model = PropertyCategory::class;

    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
