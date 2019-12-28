<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonsi', function (Blueprint $table) {
            $table->bigIncrements('hds_ma');
            $table->string('hds_nguoiMuaHang', 100);
            $table->string('hds_tenDonVi', 200);
            $table->string('hds_diaChi', 250);
            $table->string('hds_maSoThue', 14);
            $table->string('hds_soTaiKhoan', 20)->nullable()->default('NULL');
            $table->unsignedTinyInteger('nv_lapHoaDon');
            $table->dateTime('hds_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('nv_thuTruong')->default('1')->comment('Thủ trưởng: 1-chưa phân công');
            $table->timestamp('hds_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('hds_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('hds_trangThai')->default('1')->comment('Trạng thái: 1-lập hóa đơn, 2-xuất hóa đơn, 3-hủy');
            $table->unsignedBigInteger('dh_ma')->default('1')->comment('1-Không xuất hóa đơn');
            $table->unsignedTinyInteger('tt_ma');

            $table->foreign('dh_ma')->references('dh_ma')->on('donhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_lapHoaDon')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_thuTruong')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tt_ma')->references('tt_ma')->on('thanhtoan')->onDelete('CASCADE')->onUpdate('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadonsi');
    }
}
