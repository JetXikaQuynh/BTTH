<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItCentersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('it_centers')->insert([
                'name' => 'Trung tâm Tin học ' . $i,
                'location' => 'Địa điểm ' . $i,
                'contact_email' => 'contact' . $i . '@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
