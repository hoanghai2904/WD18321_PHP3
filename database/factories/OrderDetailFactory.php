<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderDetail;
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
            'order_id'=>OrderDetail::all()->random()->oder_id,
            'product_id'=>Product::all()->random()->product_id,
            'quantity'=> $this->faker->randomNumber(),
            'price'=>$this->faker->randomFloat(2,0,100),
        ];
    }
}
