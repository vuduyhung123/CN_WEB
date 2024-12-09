<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); // Mã laptop
            $table->string('brand'); // Hãng sản xuất
            $table->string('model'); // Mẫu laptop
            $table->text('specifications'); // Thông số kỹ thuật
            $table->boolean('rental_status')->default(false); // Trạng thái cho thuê
            $table->unsignedBigInteger('renter_id')->nullable(); // Mã người thuê (foreign key)
            $table->timestamps();

            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}
