<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    public function up(): void
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id(); // Mã máy tính
            $table->string('computer_name', 50); // Tên máy tính
            $table->string('model', 100); // Tên phiên bản
            $table->string('operating_system', 50); // Hệ điều hành
            $table->string('processor', 50); // CPU
            $table->integer('memory'); // RAM (GB)
            $table->boolean('available')->default(true); // Trạng thái hoạt động
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
}
