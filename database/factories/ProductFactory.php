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
        $types=["publish","draft","passive"];
        $discount=rand(1,99);
        $price=rand(1,9999);
        return [
            "title"=>$this->faker->name(),
            "description"=>$this->faker->text(200),
            "price"=>$price,
            "quantity"=>rand(1,1000),
            "image1"=>$this->faker->imageUrl(),
            "image2"=>$this->faker->imageUrl(),
            "image3"=>$this->faker->imageUrl(),
            "sub_category_id"=>rand(1,29),
            "discount"=>$discount,
            "discounted_price"=>$price-(($price/100)*$discount),
            "status"=>$types[rand(0,2)],
        ];
    }
}
