<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItems>
 */
class OrderItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Orders::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(1,5),
            'price' => $this->faker->randomFloat(2, 1, 1000)
        ];
    }
}
