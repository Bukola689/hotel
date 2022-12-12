<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'd_o_b' => $this->faker->date,
            'gender' => 'male',
            'nationality' => $this->faker->name(),
            'join_date' => $this->faker->date,
            'state' => $this->faker->name(),
            'phone_number' => $this->faker->numberBetween(1000000, 2000000),
            'image' => $this->faker->imageUrl($width = 140, $height=300),
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->sentence(),
        ];
    }
}
