<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrariesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('libraries')->insert([
                'name' => 'Thư viện IT Đại học ABC ' . $i,
                'address' => '123 Đường X, Hà Nội ' . $i,
                'contact_number' => '012345678' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
