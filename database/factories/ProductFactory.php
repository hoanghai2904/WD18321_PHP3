<?php

namespace Database\Factories;

use Carbon\Carbon;
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
    public function definition(): array
    {
        return [
          'name'=> $this->faker->sentence(4),
        'description'=> $this->faker->paragraph(),
        'price'=> $this->faker->randomFloat(2,0,100),
        'created_at'=> Carbon::now(),
        'updated_at'=> Carbon::now(),
        ];
    }
}
