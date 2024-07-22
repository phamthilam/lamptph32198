<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->word,
            'price'=>$this->faker->randomFloat(2,100,10000),
            'description'=>$this->faker->paragraph,
            'created_at'=>$this->faker->dateTime,
            'updated_at'=>$this->faker->dateTime
        ];
    }
}
