<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('posts')->insert([
            [
                'title' => 'Bài viết 1',
                'content' => 'Nội dung bài viết 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bài viết 2',
                'content' => 'Nội dung bài viết 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bài viết 3',
                'content' => 'Nội dung bài viết 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
