<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title"=>$this->faker->name(),
            "description"=>$this->faker->text(200),
            "price"=>rand(1,9999),
            "quantity"=>rand(1,1000),
            "image1"=>$this->faker->imageUrl()
        ];
    }
}
