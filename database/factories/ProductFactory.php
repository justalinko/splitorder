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
            'user_id' => rand(1, 10),
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(1000, 5000),
            'min_order' => $this->faker->numberBetween(100, 1000),
            'max_order' => $this->faker->numberBetween(1000, 1000000),
            'note' => 'Estimasi produksi 7 hari / 1000'
        ];
    }
}
