<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardwareDevicesTableSeeder extends Seeder
{
    public function run()
    {
        $device_types = ['Mouse', 'Keyboard', 'Headset', 'Monitor', 'Printer'];

        for ($i = 1; $i <= 20; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => 'Thiết bị ' . $i,
                'type' => $device_types[array_rand($device_types)],
                'status' => (rand(0, 1) == 1), // Random trạng thái hoạt động
                'center_id' => rand(1, 5), // Random mã trung tâm
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
