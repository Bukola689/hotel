<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'department_id' => Department::all()->random()->id,
            'amount' => $this->faker->numberBetween(1000, 10000),
            'bonus' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
