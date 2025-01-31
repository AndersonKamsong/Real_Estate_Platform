<?php

namespace Database\Factories;

use App\Models\ViewHistory;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViewHistoryFactory extends Factory
{
    protected $model = ViewHistory::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'property_id' => Property::factory(),
            'viewed_at' => $this->faker->dateTimeThisYear,
        ];
    }
}
