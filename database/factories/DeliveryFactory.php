<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     *   
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 10),
            'distribution_id' => $this->faker->numberBetween(1, 10),
            'expedition_id' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['waiting_pickup' ,'otw' , 'delivered' , 'done']),
            'estimated_time' => $this->faker->randomElement(['7 day', '14 day', '21 day', '28 day']),
            'delivery_date' => $this->faker->date(),
            'note' => $this->faker->text()
        ];
    }
}
