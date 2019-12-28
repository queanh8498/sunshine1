<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->unsignedBigInteger('dh_ma');
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('m_ma');
            $table->unsignedSmallInteger('ctdh_soLuong')->default('1');
            $table->unsignedInteger('ctdh_donGia')->default('1');
            
            $table->primary(['dh_ma', 'sp_ma', 'm_ma']);
            $table->foreign('dh_ma')->references('dh_ma')->on('donhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('m_ma')->references('m_ma')->on('mau')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('chitietdonhang');
    }
}
