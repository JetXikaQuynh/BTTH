<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CinemaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            DB::table('cinemas')->insert([
                'name' => $faker->company . ' Cinema',
                'location' => $faker->address,
                'total_seats' => $faker->numberBetween(100, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
