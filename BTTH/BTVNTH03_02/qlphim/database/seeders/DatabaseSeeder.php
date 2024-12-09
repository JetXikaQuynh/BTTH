<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CinemaSeeder::class);
        $this->call(MovieSeeder::class);
    }
}
