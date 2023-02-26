<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
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
        
            'product_id' => $this->faker->numberBetween(1, 20),
            'qty' => $this->faker->numberBetween(1000, 100000),
            'status' => $this->faker->randomElement(['pending', 'production', 'delivered', 'done']),
            'customer_name' => $this->faker->name(),
            'customer_phone' => $this->faker->phoneNumber(),
            'payment_method' => $this->faker->randomElement(['cash', 'transfer']),
            'down_payment' => $this->faker->numberBetween(500000, 1000000),
            'total_price' => $this->faker->numberBetween(1000000, 10000000),
            'payment_status' => 'down_payment',
            'status' => 'pending',
            'note' => $this->faker->text()
        ];
    }
}
