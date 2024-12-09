<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaptopsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('laptops')->insert([
                'brand' => ['Dell', 'HP', 'Asus', 'Lenovo', 'Apple'][rand(0, 4)],
                'model' => 'Model ' . $i,
                'specifications' => ['i5, 8GB RAM, 256GB SSD', 'i7, 16GB RAM, 512GB SSD', 'i3, 4GB RAM, 128GB SSD'][rand(0, 2)],
                'rental_status' => (rand(0, 1) == 1), // Random trạng thái cho thuê
                'renter_id' => rand(1, 5), // Random mã người thuê
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
