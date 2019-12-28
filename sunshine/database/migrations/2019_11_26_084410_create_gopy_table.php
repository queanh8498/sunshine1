<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gopy', function (Blueprint $table) {
            $table->bigIncrements('gy_ma');
            $table->dateTime('gy_thoiGian')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('gy_noiDung');
            $table->unsignedBigInteger('kh_ma');
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('gy_trangThai')->default('3')->comment('1-khóa, 2-hiển thị, 3-chờ duyệt');
            
            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gopy');
    }
}
