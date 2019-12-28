<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->bigIncrements('sp_ma');
            $table->string('sp_ten')->unique();
            $table->unsignedInteger('sp_giaGoc')->default('0');
            $table->unsignedInteger('sp_giaBan')->default('0');
            $table->string('sp_hinh');
            $table->text('sp_thongTin');
            $table->string('sp_danhGia');
            $table->timestamp('sp_taoMoi')->nullable();
            $table->timestamp('sp_capNhat')->nullable();
            $table->tinyInteger('sp_trangThai')->default('2')->comment('Trạng thái:1, 2');
            $table->unsignedTinyInteger('l_ma');

            //$table->unique(['sp_ten']);
            $table->foreign('l_ma')->references('l_ma')->on('loai') 
                                ->onDelete('CASCADE')
                                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
