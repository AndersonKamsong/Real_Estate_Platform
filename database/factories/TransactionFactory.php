<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'property_id' => Property::factory(),
            'type' => $this->faker->randomElement(['sold', 'rented']),
            'transaction_date' => $this->faker->dateTimeThisYear,
        ];
    }
}
