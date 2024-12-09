<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemasTable extends Migration
{
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự tăng
            $table->string('name'); // Tên rạp chiếu
            $table->string('location'); // Địa chỉ
            $table->integer('total_seats'); // Tổng số ghế
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('cinemas');
    }
}
