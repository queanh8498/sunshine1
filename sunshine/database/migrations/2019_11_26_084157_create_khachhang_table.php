<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->bigIncrements('kh_ma');
            $table->string('kh_taiKhoan', 50);
            $table->string('kh_matKhau', 256);
            $table->string('kh_hoTen', 100);
            $table->unsignedTinyInteger('kh_gioiTinh')->default('1')->comment('0-Nữ, 1-Nam, 2-Khác');
            $table->string('kh_email', 100);
            $table->dateTime('kh_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('kh_diaChi', 250)->nullable()->default('NULL');
            $table->string('kh_dienThoai', 11)->nullable()->default('NULL');
            $table->timestamp('kh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm đầu tiên tạo ');
            $table->timestamp('kh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật gần nhất');
            $table->unsignedTinyInteger('kh_trangThai')->default('3')->comment('1-khóa, 2-khả dụng, 3-chưa kích hoạt');
            
            $table->unique(['kh_taiKhoan', 'kh_email', 'kh_dienThoai']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
