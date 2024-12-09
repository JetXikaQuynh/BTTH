<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRentersTable extends Migration
{
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->id(); // Mã người thuê (Primary Key)
            $table->string('name'); // Tên người thuê
            $table->string('phone_number'); // Số điện thoại
            $table->string('email'); // Email
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('renters');
    }
}
