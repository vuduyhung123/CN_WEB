<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id(); // Mã máy tính (Primary Key)
            $table->string('computer_name'); // Tên máy tính
            $table->string('model'); // Tên phiên bản
            $table->string('operating_system'); // Hệ điều hành
            $table->string('processor'); // Bộ xử lý
            $table->integer('memory'); // RAM
            $table->boolean('available')->default(true); // Trạng thái hoạt động
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
