<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->bigIncrements('dh_ma')->comment('1-Không xuất hóa đơn');
            $table->unsignedBigInteger('kh_ma');
            $table->dateTime('dh_thoiGianDatHang')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('dh_thoiGianNhanHang');
            $table->string('dh_nguoiNhan', 100);
            $table->string('dh_diaChi', 250);
            $table->string('dh_dienThoai', 11);
            $table->string('dh_nguoiGui', 100);
            $table->text('dh_loiChuc')->nullable()->comment('Lời chúc ghi trên thiệp');
            $table->unsignedTinyInteger('dh_daThanhToan')->default('0')->comment('Đã thanh toán tiền (TH tặng quà)');
            $table->unsignedTinyInteger('nv_xuLy')->default('1')->comment('1-chưa phân công');
            $table->dateTime('dh_ngayXuLy')->nullable()->default(NULL);
            $table->unsignedTinyInteger('nv_giaoHang')->default('1')->comment('1-chưa phân công');
            $table->dateTime('dh_ngayLapPhieuGiao')->nullable()->default(NULL);
            $table->dateTime('dh_ngayGiaoHang')->nullable()->default(NULL)->comment('Thời điểm khách nhận được hàng');
            $table->timestamp('dh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('dh_trangThai')->default('1')->comment('1-nhận đơn, 2-xử lý đơn, 3-giao hàng, 4-hoàn tất, 5-đổi trả, 6-hủy');
            $table->unsignedTinyInteger('vc_ma');
            $table->unsignedTinyInteger('tt_ma');
            
            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_giaoHang')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_xuLy')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tt_ma')->references('tt_ma')->on('thanhtoan')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('vc_ma')->references('vc_ma')->on('vanchuyen')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
