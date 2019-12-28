<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhacungcap', function (Blueprint $table) {
            $table->smallIncrements('ncc_ma')->comment('1-Tự tạo');
            $table->string('ncc_ten', 100);
            $table->string('ncc_daiDien', 100);
            $table->string('ncc_diaChi', 250);
            $table->string('ncc_dienThoai', 11);
            $table->string('ncc_email', 100);
            $table->timestamp('ncc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ncc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('ncc_trangThai')->default('2')->comment('1-khóa, 2-khả dụng');
            $table->unsignedSmallInteger('xx_ma');
            
            $table->unique(['ncc_ten', 'ncc_dienThoai', 'ncc_email']);
            $table->foreign('xx_ma')->references('xx_ma')->on('xuatxu')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhacungcap');
    }
}
