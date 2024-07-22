<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price'=>$this->faker->randomFloat(2,100,10000),
            'quantity'=>$this->faker->randomNumber(),
            'order_id'=>Order::all()->random()->order_id,
            'product_id'=>Product::all()->random()->id_product,
            'created_at'=>$this->faker->dateTime,
            'updated_at'=>$this->faker->dateTime
        ];
    }
}
