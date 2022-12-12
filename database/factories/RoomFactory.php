<?php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_number' => $this->faker->numberBetween(100000, 1000000),
            'room_type_id' => RoomType::all()->random()->id,
            'ac_no_ac' => 'no_ac',
            'charges_for_cancellation' => '50',
            'food' => 'rice',
            'bed_count' => '2',
            'phone_number' => '08105155989',
            'rent' => 'a day',
            'file_upload' => $this->faker->imageUrl($width = 140, $height=300),
            'message' => $this->faker->paragraph(),
            'status' => 'Active',
        ];
    }
}
