<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('renters')->insert([
                'name' => 'Người thuê ' . $i,
                'phone_number' => '09876543' . $i,
                'email' => 'nguoi.thue' . $i . '@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
