<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'd_o_b' => $this->faker->date(),
            'gender' => $this->faker->name(['male', 'female']),
            'speciality' => $this->faker->name(),
            'phone_number' => $this->faker->numberBetween(1000000, 2000000),
            'email' => $this->faker->unique()->safeEmail,
            'image' => $this->faker->imageUrl($width = 140, $height=300),
            'address' => $this->faker->sentence(),
        ];
    }
}
