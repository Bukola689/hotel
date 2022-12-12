<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->name(),
            'name' => $this->faker->name(),
            'cost' => $this->faker->numberBetween(1000.2, 1999.9),
            'details' => $this->faker->sentence(),
            'status' => 'Active'
        ];
    }
}
