<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $categories = ['Game', 'CD', 'Movie'];
        return [
            'sku' => $this->faker->unique()->randomNumber,
            'name' => $this->faker->sentence,
            'image' => 'placeholder.jpg',
            'category' => $this->faker->randomElement($categories),
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
