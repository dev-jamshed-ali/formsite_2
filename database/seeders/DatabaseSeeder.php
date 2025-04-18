<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\HousesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(HousesTableSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(incomeRulesSeeder::class);
    }
}
