<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id(); // Mã thiết bị (Primary Key)
            $table->string('device_name'); // Tên thiết bị
            $table->string('type'); // Loại thiết bị
            $table->boolean('status')->default(true); // Trạng thái hoạt động (Mặc định: Đang hoạt động)
            $table->unsignedBigInteger('center_id'); // Foreign Key (Mã trung tâm)
            $table->timestamps();

            // Ràng buộc khóa ngoại
            $table->foreign('center_id')->references('id')->on('it_centers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hardware_devices');
    }
}
