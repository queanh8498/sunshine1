<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->unsignedTinyInteger('km_ma')->autoIncrement();
            $table->string('km_ten');
            $table->text('km_noiDung');
            $table->dateTime('km_batDau');
            $table->dateTime('km_ketThuc');
            $table->string('km_giaTri',50)->default('100;100');
            $table->unsignedTinyInteger('nv_nguoiLap');
            $table->dateTime('km_ngayLap');
            $table->unsignedTinyInteger('nv_kyNhay')->default('1');
            $table->unsignedTinyInteger('km_kyNhay');
            $table->dateTime('km_ngayKyNhay')->default(NULL);
            $table->unsignedTinyInteger('nv_kyDuyet')->default('1');
            $table->dateTime('km_ngayDuyet')->default(NULL);
            $table->timestamp('km_taoMoi')->nullable();
            $table->timestamp('km_capNhat')->nullable();
            $table->unsignedTinyInteger('km_trangThai');
           
            $table->unique(['km_ten']);
            $table->foreign('nv_kyDuyet')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_kyNhay')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_nguoiLap')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyenmai');
    }
}
