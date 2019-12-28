<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieunhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhap', function (Blueprint $table) {
            $table->bigIncrements('pn_ma');
            $table->string('pn_nguoiGiao', 100);
            $table->string('pn_soHoaDon', 15);
            $table->dateTime('pn_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('pn_ghiChu');
            $table->unsignedTinyInteger('nv_nguoiLapPhieu');
            $table->dateTime('pn_ngayLapPhieu')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngay` lập phiếu nhập kho');
            $table->unsignedTinyInteger('nv_keToan')->default('1')->comment('Xác nhận: 1-chưa phân công');
            $table->dateTime('pn_ngayXacNhan')->nullable()->default(NULL);
            $table->unsignedTinyInteger('nv_thuKho')->default('1')->comment('Thủ kho: 1-chưa phân công');
            $table->dateTime('pn_ngayNhapKho')->nullable()->default(NULL);
            $table->timestamp('pn_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('pn_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('pn_trangThai')->default('2')->comment('Trạng thái phiếu nhập: 1-khóa, 2-lập phiếu, 3-thanh toán, 4-nhập kho');
            $table->unsignedSmallInteger('ncc_ma')->comment('Nhà cung cấp');

            
            $table->unique(['pn_soHoaDon']);
            $table->foreign('ncc_ma')->references('ncc_ma')->on('nhacungcap')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_keToan')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_nguoiLapPhieu')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_thuKho')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieunhap');
    }
}
