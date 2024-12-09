<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItCentersTable extends Migration
{
    public function up()
    {
        Schema::create('it_centers', function (Blueprint $table) {
            $table->id(); // Mã trung tâm (Primary Key)
            $table->string('name'); // Tên trung tâm
            $table->string('location'); // Địa điểm
            $table->string('contact_email'); // Email liên hệ
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('it_centers');
    }
}
