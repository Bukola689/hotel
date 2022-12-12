<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_department' => $this->faker->name(),
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'salary_range' => $this->faker->numberBetween(1234, 9876),
        ];
    }
}
