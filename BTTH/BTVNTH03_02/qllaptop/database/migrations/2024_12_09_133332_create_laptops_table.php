<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); // Mã laptop (Primary Key)
            $table->string('brand'); // Hãng sản xuất
            $table->string('model'); // Mẫu laptop
            $table->text('specifications'); // Thông số kỹ thuật
            $table->boolean('rental_status')->default(false); // Trạng thái cho thuê (mặc định là chưa cho thuê)
            $table->unsignedBigInteger('renter_id')->nullable(); // Foreign Key (Mã người thuê)
            $table->timestamps();

            // Ràng buộc khóa ngoại
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}
