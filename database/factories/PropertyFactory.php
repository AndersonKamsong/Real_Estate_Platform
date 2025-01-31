<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(10000, 1000000),
            'type' => $this->faker->randomElement(['rent', 'buy']),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'sqft' => $this->faker->numberBetween(500, 5000),
            'location' => $this->faker->address,
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(['available', 'sold', 'rented']),
        ];
    }
}