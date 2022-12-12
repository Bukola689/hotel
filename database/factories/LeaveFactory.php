<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' =>Employee::all()->random()->id,
            'leave_date' => $this->faker->date(),
            'status' => 'Pending',
            'reason' => $this->faker->sentence()
        ];
    }
}
