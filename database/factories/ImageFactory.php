<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'image_path' => $this->faker->imageUrl(640, 480, 'property'),
        ];
    }
}
