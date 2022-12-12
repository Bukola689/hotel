<?php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
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
            'room_type_id' => 1,
            'total_number' => $this->faker->numberBetween(1, 10),
            'gender' => 'male',
            'id_card' => 'Voters Card',
            'checkin' => $this->faker->date,
            'checkout' => $this->faker->date,
            'date' => $this->faker->date,
            'time' => $this->faker->time,
            'phone_number' => $this->faker->numberBetween(1000000, 2000000),
            'email' => $this->faker->unique()->safeEmail,
            'image' => $this->faker->imageUrl($width = 140, $height=300),
            'message' => $this->faker->paragraph(),
            'address' => $this->faker->paragraph(),
            'status' => 'Active',
        ];
    }
}
