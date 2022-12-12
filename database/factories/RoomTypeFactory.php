<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'roomtype' => $this->faker->name,
            'description' =>$this->faker->sentence(),
            'cost' => $this->faker->numberBetween(100.0, 900,9 ),
            'status' => 'active',
        ];
    }
}
