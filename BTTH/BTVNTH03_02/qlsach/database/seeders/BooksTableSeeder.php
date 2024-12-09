<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('books')->insert([
                'title' => 'Sách số ' . $i,
                'author' => 'Tác giả ' . $i,
                'publication_year' => rand(1990, 2023),
                'genre' => ['Programming', 'Database', 'Networking', 'AI', 'Web Development'][rand(0, 4)],
                'library_id' => rand(1, 5), // Random Thư viện
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
