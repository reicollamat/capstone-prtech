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
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2),
            'category' => fake()->randomElement([
                'processor',
                'graphics_card',
                'motherboard' ,
                'ram',
                'psu',
                'case',
                'cooling',
                'monitor',
                'keyboard',
                'mouse',
                'others',
            ])
        ];
    }
}
