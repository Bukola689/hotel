<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            RoomTypeSeeder::class,
            RoomSeeder::class,
            CustomerSeeder::class,
            BookingSeeder::class,
            EmployeeSeeder::class,
            ItemSeeder::class,
            StaffSeeder::class,
            DepartmentSeeder::class,
            SalarySeeder::class,
           // LeaveSeeder::class,
        ]);
    }
}
