<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateMoviesTable extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự tăng
            $table->string('title'); // Tên phim
            $table->string('director'); // Đạo diễn
            $table->date('release_date'); // Ngày phát hành
            $table->integer('duration'); // Thời lượng phim
            $table->foreignId('cinema_id')->constrained('cinemas')->onDelete('cascade'); // Khóa ngoại
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
