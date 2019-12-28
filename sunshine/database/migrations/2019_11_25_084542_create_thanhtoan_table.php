<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->unsignedTinyInteger('tt_ma')->autoIncrement();
            $table->string('tt_ten');
            $table->text('tt_dienGiai')->comment('Thông tin phương thức thanh toán');
            $table->timestamp('tt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo phương thức thanh toán');
            $table->timestamp('tt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật phương thức thanh toán gần nhất');
            $table->unsignedTinyInteger('tt_trangThai')->default('2')->comment('1-khóa, 2-hiển thị');
          
            $table->unique(['tt_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanhtoan');
    }
}
