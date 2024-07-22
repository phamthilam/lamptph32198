<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'totalPrice'=>$this->faker->randomFloat(2,100,10000),
            'user_id'=>User::all()->random()->id_user,
            'created_at'=>$this->faker->dateTime,
            'updated_at'=>$this->faker->dateTime
            //
        ];
    }
}
