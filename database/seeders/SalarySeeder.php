<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Salary::factory(5)->create();
    }
}
